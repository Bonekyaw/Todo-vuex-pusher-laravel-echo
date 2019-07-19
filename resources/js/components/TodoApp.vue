<template>
         <section class="todoapp">
                <header class="header">
                  <h1>todos</h1>
                </header>
                <new-todo></new-todo>
                <todo-list></todo-list>
         </section>
</template>
     <script>
    import newTodo from "../components/NewTodo.vue";
    import todoList from "../components/TodoList.vue";
    import { mapGetters } from "vuex";

    export default {
      components: {
       newTodo,
       todoList
      },
      name: "TodoApp",
      mounted() {
        window.Echo.channel("newTask").listen(".task-created", e => {
          this.$store.commit("ADD_TODO", e.task);
          this.newTodo.title = "";
        });
        window.Echo.channel("taskRemoved").listen(".task-removed", e => {
            this.$store.commit("DELETE_TODO", this.toRemove);
        });
      },
      computed: {
        ...mapGetters(["newTodo", "toRemove"])
      }
    };
    </script>


<!--     newTask channel: we listen the task-created event triggered when a new to-do is added to the list. Then we commit the ADD_TODO mutation with the task sent carried by the event, in order to add it to our to-dos list. Finally we reset our newTodo we import from our Vuex store.

    taskRemoved channel, this channel enables to listen to the task-removed event triggered when a task/to-do is removed from our list. When the event is emit, we assign the task deleted to our toRemove object we set up in our Vuex store, and we commit the DELETE_TODO mutation to finally remove it from to-dos list.
 -->