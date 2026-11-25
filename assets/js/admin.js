const APP_BASE = '../';
const ADMIN_BASE = '';

function adminSignIn() {

    var un = document.getElementById("un");
    var pw = document.getElementById("pw");

    var f = new FormData();
    f.append("u", un.value);
    f.append("p", pw.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            if (response == "Success") {
                document.getElementById("msg").innerHTML = "Admin Login Successful";
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgDiv").className = "d-block";

                un.value = "";
                pw.value = "";

                window.location = ADMIN_BASE + "adminDashboard.php";

            } else {
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msgDiv").className = "d-block";
            }
        }
    };

    request.open("POST", APP_BASE + "api/adminSignInProcess.php", true);
    request.send(f);
}

function reload() {
    location.reload();
}

function loadUser() {

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            document.getElementById("tb").innerHTML = response;
        }
    };

    request.open("POST", APP_BASE + "api/loadUserProcess.php", true);
    request.send();
}

function updateUserStatus() {
    var userid = document.getElementById("uid");

    var f = new FormData();
    f.append("u", userid.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;

            if (response == "Inactive") {
                Swal.fire({
                    title: 'Deactivated!',
                    text: 'User has been deactivated successfully',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    userid.value = "";
                    loadUser();
                });

            } else if (response == "Active") {
                Swal.fire({
                    title: 'Activated!',
                    text: 'User has been activated successfully',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    userid.value = "";
                    loadUser();
                });

            } else {
                Swal.fire({
                    title: 'Oops!',
                    text: response,
                    icon: 'error',
                    confirmButtonText: 'OK'
                })
            }
        }
    };

    request.open("POST", APP_BASE + "api/updateUserStatusProcess.php", true);
    request.send(f);
}

function brandReg() {
    var brand = document.getElementById("brand");

    var f = new FormData();
    f.append("b", brand.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;

            if (response == "Success") {
                document.getElementById("msg1").innerHTML = "Brand Registration Successful";
                document.getElementById("msg1").className = "alert alert-success";
                document.getElementById("msgDiv1").className = "d-block";

                brand.value = "";

            } else {
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msgDiv1").className = "d-block";
            }
        }
    };

    request.open("POST", APP_BASE + "api/brandRegisterProcess.php", true);
    request.send(f);
}

function categoryReg() {
    var cat = document.getElementById("cat");

    var f = new FormData();
    f.append("c", cat.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;

            if (response == "Success") {
                document.getElementById("msg2").innerHTML = "Category Registration Successful";
                document.getElementById("msg2").className = "alert alert-success";
                document.getElementById("msgDiv2").className = "d-block";

                cat.value = "";

            } else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msgDiv2").className = "d-block";
            }
        }
    };

    request.open("POST", APP_BASE + "api/categoryRegisterProcess.php", true);
    request.send(f);
}

function colorReg() {
    var color = document.getElementById("color");

    var f = new FormData();
    f.append("c", color.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;

            if (response == "Success") {
                document.getElementById("msg3").innerHTML = "Color Registration Successful";
                document.getElementById("msg3").className = "alert alert-success";
                document.getElementById("msgDiv3").className = "d-block";

                color.value = "";

            } else {
                document.getElementById("msg3").innerHTML = response;
                document.getElementById("msgDiv3").className = "d-block";
            }
        }
    };

    request.open("POST", APP_BASE + "api/colorRegisterProcess.php", true);
    request.send(f);
}


function seriesReg() {
    var series = document.getElementById("series");

    var f = new FormData();
    f.append("s", series.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;

            if (response == "Success") {
                document.getElementById("msg4").innerHTML = "Series Registration Successful";
                document.getElementById("msg4").className = "alert alert-success";
                document.getElementById("msgDiv4").className = "d-block";

                series.value = "";

            } else {
                document.getElementById("msg4").innerHTML = response;
                document.getElementById("msgDiv4").className = "d-block";
            }
        }
    };

    request.open("POST", APP_BASE + "api/seriesRegisterProcess.php", true);
    request.send(f);
}

function searchUser() {
    var uname = document.getElementById("uname");

    if (uname.value != "") {
        var f = new FormData();
        f.append("u", uname.value);

        var request = new XMLHttpRequest();

        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var response = request.responseText;

                if (response == "notfound") {
                    Swal.fire({
                        title: 'Sorry!',
                        text: 'We couldn\'t find any results',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        uname.value = "";
                    });

                } else {
                    document.getElementById("tb").innerHTML = response
                }
            }
        };

        request.open("POST", APP_BASE + "api/searchUserProcess.php", true);
        request.send(f);

    } else {
        Swal.fire({
            title: 'Sorry!',
            text: 'Please enter a user name to proceed',
            icon: 'error',
            confirmButtonText: 'OK'
        }).then(() => {
            uname.value = "";
        });
    }
}

function regProduct() {

    var pname = document.getElementById("pname");
    var brand = document.getElementById("brand");
    var cat = document.getElementById("cat");
    var color = document.getElementById("color");
    var series = document.getElementById("series");
    var desc = document.getElementById("desc");
    var file = document.getElementById("file");

    var f = new FormData();
    f.append("pname", pname.value);
    f.append("brand", brand.value);
    f.append("cat", cat.value);
    f.append("color", color.value);
    f.append("series", series.value);
    f.append("desc", desc.value);
    f.append("image", file.files[0]);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;

            if (response == "Success") {
                Swal.fire({
                    title: 'Great Job!',
                    text: 'Product Registration Successful',
                    icon: 'success',
                    confirmButtonText: 'Nice'

                }).then(() => {
                    pname.value = "";
                    desc.value = "";
                    location.reload();
                })

            } else {
                Swal.fire({
                    title: 'Wait!',
                    text: response,
                    icon: 'error',
                    confirmButtonText: 'OK'

                })

            }

        }
    };

    request.open("POST", APP_BASE + "api/productRegProcess.php", true);
    request.send(f);
}


function updateStock() {

    var pname = document.getElementById("selectProduct");
    var qty = document.getElementById("qty");
    var price = document.getElementById("uprice");

    var f = new FormData();
    f.append("p", pname.value);
    f.append("q", qty.value);
    f.append("up", price.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;

            if (response == "Stock Updated Successfully") {
                Swal.fire({
                    title: 'Great Job!',
                    text: 'Stock Updated Successfully',
                    icon: 'success',
                    confirmButtonText: 'Nice'

                }).then(() => {
                    qty.value = "";
                    price.value = "";
                    location.reload();
                })

            } else if (response == "New Stock Added Successfully") {
                Swal.fire({
                    title: 'Great Job!',
                    text: 'New Stock Added Successfully',
                    icon: 'success',
                    confirmButtonText: 'Nice'

                }).then(() => {
                    qty.value = "";
                    price.value = "";
                    location.reload();
                })

            } else {
                Swal.fire({
                    title: 'Wait!',
                    text: response,
                    icon: 'error',
                    confirmButtonText: 'OK'

                })
            }
        }
    };

    request.open("POST", APP_BASE + "api/updateStockProcess.php", true);
    request.send(f);

}

function printDiv() {
    var original = document.body.innerHTML;
    var printArea = document.getElementById("printArea").innerHTML;

    document.body.innerHTML = printArea;

    window.print();

    document.body.innerHTML = original;
}

function adminSignOut() {

    Swal.fire({
        title: 'Are you sure?',
        text: 'Do you want to log out?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Sign me out!',
        cancelButtonText: 'No, let me in'
    }).then((result) => {
        if (result.isConfirmed) {

            var request = new XMLHttpRequest();

            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    var response = request.responseText;

                    if (response == "Success") {
                        Swal.fire({
                            title: 'Signed Out!',
                            text: 'Success',
                            icon: 'success',
                            confirmButtonText: 'Nice'
                        }).then(() => {
                            window.location = ADMIN_BASE + "adminSignIn.php";

                        });

                    }

                }
            };

            request.open("POST", APP_BASE + "api/adminSignOutProcess.php", true);
            request.send();
        }
    });
}


function loadChart(report, chartType) {
    var ctx = document.getElementById('myChart');

    var f = new FormData();
    f.append("report", report);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var data = JSON.parse(request.responseText);

            var options = {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            };
            if (chartType === 'pie' || chartType === 'bar') {
                options.indexAxis = 'y';
            }

            new Chart(ctx, {
                type: chartType,
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: data.datasetLabel || 'Value',
                        data: data.data,
                        borderWidth: 1
                    }]
                },
                options: options
            });
        }
    };

    request.open("POST", APP_BASE + "api/loadChartProcess.php", true);
    request.send(f);
}
