// Ajax post
        $(document).ready(function() {
            // Declare number of comments for longpolling
            var numberOfRows = 0;
            // Show comments
            showComments();
            // Start longpolling
            longpolling(numberOfRows);
            
            function longpolling(rows){
                // Get value of the current recipe
                var site = $("button#submit-comment").val();
                // Make ajax call
                jQuery.ajax({
                    type: "POST",
                    url: "http://localhost:8888/ID1354/sem4/" + "comments/longpolling",
                    dataType: 'json',
                    data: {
                        rows: rows,
                        site: site
                    },
                    success: function(res) {
                        if(res){
                            // Print new new changes after polling
                            if (res != rows){
                                $('#commento').empty();
                                showComments();
                            }
                            // Recursive call
                            longpolling(res);
                        }
                    }
                });
            }
            
            
            $("#submit-comment").click(function(event) {
                // Prevent the default action.
                event.preventDefault();
                // Get comment and current site.
                var comment = $("textarea#comment").val();
                var site = $("button#submit-comment").val();
                // Make ajax call that adds the new comment.
                jQuery.ajax({
                    type: "POST",
                    url: "http://localhost:8888/ID1354/sem4/" + "comments/create",
                    dataType: 'json',
                    data: {
                        comment: comment,
                        site: site
                    },
                    success: function(res) {
                        if (res) {
                            // Show Entered Value in dom
                            $('#commento').append('<div class="media">' +
                                '<div class="media-body">' +
                                '<h4 class="media-heading">' + res.username + '<small><i>    Posted on ' + res.today +'</i></small></h4>' +
                                '<p>' + comment);
                            if(res.username == $('#current-user').val()){
                                $('#commento').append("<button type='button' class='btn btn-danger delete-comment' value='"+ res.comment_id +"' style='float: right;'>Delete</button>");
                            }
                            $('#commento').append('</p></div></div>');  
                        }
                    }
                });
                // Empty the textarea
                $("textarea#comment").val('');
            });
            
            
            $('#commento').on('click', '.delete-comment', function(){
                // Prevent the default action
                event.preventDefault();
                // Get the ID of the comment and current site.
                var comment_id = $(this).val();
                var site = $("button#submit-comment").val();
                // Make ajax call that deletes comment.
                jQuery.ajax({
                    url: "http://localhost:8888/ID1354/sem4/" + "comments/delete/" + comment_id + "/"+ site,
                    dataType: 'json',
                    success: function(res) {
                        if (res) {
                            
                        }
                    }
                });
                // Load new comments.
                $('#commento').empty();
                showComments();
            });
            
            function showComments(){
                // Get current site
                var site = $("button#submit-comment").val();
                // Make ajax call that loads comments
                jQuery.ajax({
                    type: "POST",
                    url: "http://localhost:8888/ID1354/sem4/" + "comments/show",
                    dataType: 'json',
                    data: {
                        site: site
                    },
                    success: function(res) {
                        if (res) {
                            // Take only to comments to an array
                            comments = res.comments
                            // Set number of comments
                            numberOfRows = comments.length;
                            // Print comments
                            for(i = 0; i < comments.length; i++){
                                $('#commento').append('<div class="media">' +
                                '<div class="media-body">' +
                                '<h4 class="media-heading">' + comments[i].username + '<small><i>    Posted on ' + comments[i].time +'</i></small></h4>' +
                                '<p>' + comments[i].comment);
                                // If the logged in user is the same as the user on
                                // the comment add the delete button
                                if(comments[i].username == $('#current-user').val()){
                                    $('#commento').append("<form><button type='button' class='btn btn-danger delete-comment' value='"+ comments[i].id +"' style='float: right;'>Delete</button></form>");
                                }
                                $('#commento').append('</p></div></div>');
                            }
                            
                        }
                    }
                });
            }

        });