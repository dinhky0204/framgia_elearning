<template lang="html">
  <div class="">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>User</th>
          <th>Comment</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="comment in comments" >
            <td>@{{comment.user_id}}</td>
            <td>@{{comment.comment_content}}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script>
import Comment from './Comment.vue';
export default {
    data() {
      return {
          comments: []
      }
    },
    components: { Comment },
    created () {
      this.fetchComments();
    },
    mounted() {
       console.log(comments)
    },
    methods: {
      fetchComments() {
//        axios.get('/comments', this.$data);
          this.$http.get('/comments', function (data) {
             this.$set('comments', data)
          });
      }
    },
    ready: function() {
      this.fetchComments()
    }
}
</script>
