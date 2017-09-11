<template lang="html">
  <tr>
    <td>
      {{comment.user_name}}
    </td>
    <td>
      {{comment.content}}
    </td>
  </tr>

</template>
<script>
    props:['comment']
    export default {
      mounted() {
         console.log('Component Comment mounted.')
      },
  }
</script>
