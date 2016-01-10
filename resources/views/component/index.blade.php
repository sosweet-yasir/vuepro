<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/app.css') !!}">
    {{--<style href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"></style>--}}
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">--}}
</head>
<body>

<h1>My First Heading</h1>

<div class="container">
        <div class="col-md-11 col-md-offset-0">
            <div class="panel panel-default">
                {{--div bind with vue model via id app--}}
                <div id="app" class="form-group">

                    <div class="form-group">
                        <h3>@{{ message }}</h3>
                    </div>
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


                    <div class="row">
                        <div class="form-group col-md-9 col-md-offset-1" >
                            <label for="subject">Enter Subject</label>
                            <input v-model="subject" name="subject" class="form-control" >
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-9 col-md-offset-1" >
                            <label for="message">Enter Message</label>
                            <textarea v-model="message" rows="5" class="form-control"></textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class=" col-lg-offset-10">
                            <button class="btn btn-primary btn-block" type="submit">Send message</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>




<script src="{!! asset('js/app.js') !!}"></script>
<script>
    var data={
        subject:'new message',
        message:'this is your message'
    }
    new Vue({
        el: '#app',
        data: data
    });
</script>
</body>
</html>
