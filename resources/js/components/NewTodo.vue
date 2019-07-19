<template>
         <input type="text" v-model="newTodo.title"
         @keyup.enter="addTodo" autofocus="autofocus"
          placeholder="What are you trying to get done?" class="new-todo">
</template>
    <script>
    import { mapGetters } from "vuex";
    export default {
      name: "NewTodo",
      methods: {
        addTodo() {
          this.$store.dispatch("ADD_TODO", this.newTodo);
        }
      },
      computed: {
        ...mapGetters(["newTodo"])  //We get the newTodo state object from our getters using Vue.js mapGetters helper and bind it to our input
      }
    };
    </script>