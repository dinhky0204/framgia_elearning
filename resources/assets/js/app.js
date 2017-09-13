
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
// import Comments from './components/Comments.vue';
Vue.component('example', require('./components/Example.vue'));
Vue.component('comments', require('./components/Comments.vue'));

new Vue({
    el: "#test_app",
    data() {
        return {
            question_content: "",
            question_type: 1,
            list_tag: [],
            list_content: [],
            total_answer: 1,
            question_point: 1,
            correct: 1,
            course: 1,
            data_response: "",
            image: [
                {link: ""}
            ],
            status: false
        }
    },
    methods: {
        createQuestion() {
            axios.post('/admin/create_question', this.$data).
                then(response => {
                    // console.log(response.data);
                // console.log(response.data);
                this.data_response = response.data;
                if (this.data_response=='success') {
                    this.question_content = ""
                    this.total_answer = 1
                    this.question_point = 1
                    this.correct = 1
                    this.course = 1
                    this.image = [{link: ""}]
                    this.list_tag= []
                    this.list_content= []
                    this.status = true
                }
            });
        },
        onFileChange(e) {
            var fileReader = new FileReader()
            fileReader.readAsDataURL(e.target.files[0])
            // console.log(fileReader)
            fileReader.onload = (e) => {
                this.image.push({link: e.target.result})
            }
            // console.log(this.image)
        }

    }
});

new Vue({
    el: '#list_comment',
    data() {
        return {
            comments: [],
            new_comment: {
                comment_content: ""
            },
            comment_content: "",
            user_name: "",
            post_id: "",
            errors: {},
            success: false,
            edit: false,
            comment_edit_id: ""
        }
    },
    mounted() {
        var url = window.location.pathname;
        var url_array = url.split('/');
        this.post_id = url_array[2];
        this.fetchComments(this.post_id);
    },
    methods: {
        fetchComments(id) {
            axios.get('/getcomments/' + id).
            then(response => {
                this.comments = response.data;
            }).
            catch(function (error) {
                console.log(error);
            });
        },
        onSubmit() {
            axios.post('/createComments/' + this.post_id, this.new_comment).
            then( response => {
                this.fetchComments(this.post_id);
                this.new_comment.comment_content = "";
            });
            self = this
            this.success = true
            setTimeout(function () {
                self.success = false
            }, 4000)
        },
        showComment(id) {
            this.edit = true;
            this.comment_edit_id = id;
            axios.get('/comment/' + id).
                then(response => {
                this.new_comment.comment_content = response.data.content;
            });
        },
        editComment(edit_id) {
            axios.patch('/createComments/' + edit_id, this.new_comment).
            then( response => {
                this.fetchComments(this.post_id)
                this.edit = false
                this.new_comment.comment_content = ""
                console.log(response.data)
            });
        },
        removeComment(id) {
            var ConfirmBox = confirm("Are you sure, you want to delete this comment? ")
            if(ConfirmBox) axios.delete('/deleteComment/' + id)
            this.fetchComments(this.post_id)
        }
    },
    ready: function() {
        this.fetchComments(this.post_id);
    }
});
