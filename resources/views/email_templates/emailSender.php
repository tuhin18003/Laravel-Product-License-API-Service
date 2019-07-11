<html>
<head>
    <title>Email sender</title>
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
</head>

<body>
<div class="sent-info">
    <strong>Total sent :</strong>
    <span class="total_sent">0</span>
</div>    
<input type="text" id="email_type" value="<?php echo $_GET['email_type']?>" />
<input type="text" id="total_user" value="<?php echo $_GET['stop_at']?>" />
<input type="text" id="start_from" value="<?php echo $_GET['start_from']?>" />
<button type="button" id="email_sender" >Start Sending email</button>
<script type="text/javascript">
$(document).ready(function(){
    var module = {
        loop_running : false,
        next_user_id : parseInt($('#start_from').val()),
        ajax_request : async function( args ){
            module.loop_running = true;
            return new Promise( (resolve, reject) => {

            args.data.next_user_id = module.next_user_id;    
            console.log(' next user id : ' + args.data.next_user_id )
            
            $.ajax({
                method: "POST",
                url: args.url,
                data: args.data
            }).done(function( res ) {
                var $total_sent = parseInt($(".total_sent").text()) + 1;
                $(".total_sent").text( $total_sent );
                module.next_user_id += 1;    
                resolve( res );
            }).fail(function( res ) {
                
                reject( res );
            });


            });
        },
        stopSending: function( $this, email, resMsg ){
            clearInterval( email );
            $this.text('Start Sending email').removeAttr('disabled');
            console.log( 'stopped! ' + resMsg);
        }
    };

    $("#email_sender").on('click', function(){
        var $this = $(this);
        $this.text('Sending..').attr('disabled', '');
        var action_url = 'https://myportal.coinmarketstats.online/api/' + $("#email_type").val();
        var totalUser = parseInt($("#total_user").val());

        var l = 1;
        var email = setInterval( async () =>  {

            console.log( 'beeping..');

            var data = {
                url : action_url,
                data : { next_user_id : module.next_user_id }
            };    

            if( false === module.loop_running ) {
                const response = await module.ajax_request( data )
                .then( res => { 
                    module.loop_running = false; 
                    if( l === totalUser ){
                        module.stopSending($this, email, 'success');
                    }
                    console.log( res.message );
                    return res; 
                })
                .catch( res => {
                    module.stopSending($this, email, 'error');
                    console.log( res );
                });

                // console.log( response );

                l++;
            }
            
        }, 1000);

    });

});
</script>
</body>

</html>