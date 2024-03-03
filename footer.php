</main>

        <script>
            $(document).ready(function(){

                let employee_id;

                $("#logoutModalBtn").click(function(){
                    employee_id = $(this).data('bs-employee_id');

                    logout(employee_id);
                });
            });

            function logout(employee_id){
                $.ajax({
                    type: 'POST',
                    url: 'Controller/logout.php',
                    data:{
                        emp_id: employee_id,  
                    },
                    success: function(response){
                        if(response == 'success'){
                            alert('successfully logout');
                            window.location.href = '../attendance_monitoring';
                        }
                    },
                    error: function (error){
                        console.log(error);
                    }
                });
            }
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>