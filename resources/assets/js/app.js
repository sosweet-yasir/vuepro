/**
 * Created by yasir.rasool on 1/22/2016.
 */
Vue.component('tasks', {
    template: "#tasks-template",
    data:function(){
        return{
            list:[]
        };
    },
    created:function(){
        this.$http.get('api/tasks', function(tasks){
            this.list = tasks;
        });
        //$.getJSON('api/tasks', function(tasks){
        //    this.list = tasks;
        //}.bind(this));//no more use of jquery
    },
    methods:{
        deleteTask: function(task){
            this.list.$remove(task);
            $.getJSON('component/'+task.id, function(data){
               console.log(data);
            });
        }
    }

});
new  Vue({
    el: 'body'
})