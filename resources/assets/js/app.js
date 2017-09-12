
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Comments from './components/Comments.vue';
// Vue.http.headers.common['X-CSRF-TOKEN'] = Laravel.csrfToken;
// new Vue({
//     el: "#app",
//
//     data: {
//         comment_content: "abc",
//         user_name: "",
//         errors: {}
//     },
//     // created () {
//     //     this.fetchComments();
//     // },
//     methods: {
//         onSubmit() {
//             axios.post('/comments', this.$data);
//         },
//         // fetchComments() {
//         //     axios.get('/comments', this.$data);
//         // }
//     }
// });

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
