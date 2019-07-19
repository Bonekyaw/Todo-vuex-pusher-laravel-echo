let mutations = {
        ADD_TODO(state, todo) {
            state.todos.unshift(todo)  //setter new todo to top to-dos list
        },
        CACHE_REMOVED(state, todo) {
          state.toRemove = todo;        //keeps track temporarily of the to-do to remove
        },
        GET_TODOS(state, todos) {
            state.todos = todos         //sets our to-dos list
        },
        DELETE_TODO(state, todo) {
            state.todos.splice(state.todos.indexOf(todo), 1)  //delete todo
            state.toRemove = null;
        }
    }
export default mutations