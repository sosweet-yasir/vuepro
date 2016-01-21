<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/app.css') !!}">
    <style>
        .working{text-decoration: line-through;}
    </style>
</head>
<body>

<div class="container">
        <div class="col-md-11 col-md-offset-0">
            <div class="panel panel-default">
                <div id="name" class="row">
                    <div class="form-group col-md-9 col-md-offset-1" >
                        <h1> @{{ fullName }}</h1>
                        <input v-model="first" class="form-control">
                        <input v-model="last" class="form-control">

                    </div>
                </div>

                <span id="skill">
                <div class="row">
                    <div class="form-group col-md-9 col-md-offset-1" >
                        <h1>Skill: @{{ skill }}</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-9 col-md-offset-1" >
                        <input v-model="points" class="form-control">
                    </div>
                </div>
                    </span>
                {{--div bind with vue model via id app--}}
                <div id="app" class="form-group">

                    <div class="row">
                        <div class="form-group col-md-9 col-md-offset-1" >
                            <p v-show="!subject">please enter subject</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-9 col-md-offset-1" >
                            {{-- v-if also remove element like it remove <p> tag --}}
                            <p v-if="!message">please enter message</p>
                        </div>
                    </div>

                    <form @submit.prevent ="handleIt" method="post" action="{!! route('component.store') !!}">
                        <input value="{!! csrf_token() !!}" name="_token" hidden>
                        <div class="row">
                            <div class="form-group col-md-9 col-md-offset-1" >
                                <label for="subject">Enter Subject</label>
                                <input v-model="subject" name="subject" class="form-control" >
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-9 col-md-offset-1" >
                                <label for="message">Enter Message</label>
                                <textarea v-model="message" name="message" rows="5" class="form-control"></textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class=" col-lg-offset-10">
                                <button class="btn btn-primary btn-block" type="submit">Send message</button>
                                <a @click="increment" class="btn btn-primary btn-block">
                                    increment value @{{ count }}
                                </a>
                                <counter subject="Likes"></counter>
                                <counter subject="Dislikes"></counter>
                            </div>
                        </div>
                    </form>
                </div>
                {{--end app div--}}

                {{--plans div for Vue js--}}
                <div id="plans">
                    <div v-for="plan in plans">
                        <plan :active.sync="active" :plan="plan" inline-template>
                            <span class="col-md-offset-1">@{{ plan.name }}</span>
                            <span class="col-md-offset-1">@{{ plan.price }}/month</span>
                            <a @click="setActivePlan" v-show="plan.name != active.name" class="btn btn-default col-md-offset-1">
                                @{{ isUpgrade? 'Upgrade' : 'Downgrade' }}
                            </a>
                            <span v-else class="col-md-offset-1">
                                Selected
                            </span>
                        </plan>
                    </div>
                </div>
                {{--end plans div--}}
                </br>
                {{--vary some inline style on some condation--}}
                <div id="style">
                    <ul>
                        <li @click="name.working = !name.working" v-for="name in names" :class="{'working': !name.working}" >
                            @{{ name.body }}
                        </li>
                    </ul>
                </div>

                {{--custom tag/component creating--}}
                <div id="custom">
                   <tasks :list="tasks"></tasks>
                   <tasks :list="tasks"></tasks>
                   <tasks :list="[{body: 'do this', completed: 'false'}]"></tasks>
                </div>

            </div>
        </div>
</div>

<template id="counter-template">
    <h1>@{{subject}}</h1>
    <a @click='count++' class="btn btn-primary btn-block">@{{ count }} </a>
</template>


{{--template for plan--}}
{{--<template id="plan-template">--}}

{{--</template>--}}

<template id="custom_template">
    <ul>
        <li
                :class="{'working': !task.completed}"
                v-for="task in list"
                @click="task.completed = !task.completed"
        >
        @{{ task.body }}
        </li>
    </ul>
</template>



<script src="{!! asset('js/app.js') !!}"></script>
<script>
    Vue.component('tasks',{
        props:['list'],
        template: '#custom_template'

    });

    new Vue({
        el: '#custom',
        data:{
            tasks:[
                {body: 'Go to the Store', completed: false},
                {body: 'Go to the bank', completed: false},
                {body: 'Go to the Doctor', completed: true}
            ]
        },

    });

    new Vue({
        el:'#style',
        data:{
            names:[
                {body: 'yasir', working: true},
                {body: 'shahzaib', working: false},
                {body: 'aqeel', working: false},
                {body: 'fahid', working: true}
            ],
            working:'work'
        }
    })

    new Vue({
        el: '#plans',

        data:{
            plans:[
                {name: 'Enterprise', price: 100},
                {name: 'Pro', price: 50},
                {name: 'Personal', price: 10},
                {name: 'Free', price: 0}
            ],
            active:{}
        },

        components: {
            plan: {
//                template: '#plan-template', //template is inline now

                props: ['plan', 'active'],

                methods: {
                    setActivePlan: function () {
                        this.active = this.plan;
                    }
                },

                computed:{
                    isUpgrade:function(){
                        return this.plan.price > this.active.price

                    }
                }

            }
        }
    })


    {{--globla component--}}
    Vue.component('counter', {
        template: '#counter-template',
        props:['subject'],
        data:function(){
            return {count : 0}
        }
    });

    var data={
        subject:'new message',
        message:'this is your message',
        count : 0
    }
    new Vue({
        el: '#app',
        data: data,
        methods:{
            handleIt: function() {
                alert("handeled");
            },
            increment:function (){
                this.count++;
            }
        }

    });

    new Vue({
        el:'#skill',
        data:{points : 500},
        computed:{
            skill:function(){
                if (this.points<=100)
                    return 'Beginner';
                else
                    return 'Advance';
            }
        }
    })

    new Vue({
        el:'#name',
        data:{
            first:'Yasir',
            last: 'Rasool'
        },
        computed:{
            fullName: function (){
            return this.first+' '+this.last;
            }
        }
    })



</script>
</body>
</html>
