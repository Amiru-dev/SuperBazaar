const APP_BASE = '';
const ADMIN_BASE = 'admin/';

function signUp() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var username = document.getElementById("username");
    var password = document.getElementById("password");

    var f = new FormData();
    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("e", email.value);
    f.append("m", mobile.value);
    f.append("u", username.value);
    f.append("p", password.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText.trim();

            if (response == "Success") {
                document.getElementById("msg3").innerHTML = "Registration Successful! Redirecting to Sign In...";
                document.getElementById("msg3").className = "alert alert-success";
                document.getElementById("msgDiv3").className = "d-block";

                fname.value = "";
                lname.value = "";
                email.value = "";
                mobile.value = "";
                username.value = "";
                password.value = "";

                setTimeout(function () {
                    window.location = APP_BASE + "signIn.php";
                }, 1200);

            } else {

                document.getElementById("msg3").innerHTML = response;
                document.getElementById("msg3").className = "alert alert-danger";
                document.getElementById("msgDiv3").className = "d-block";
            }
        }
    };

    request.open("POST", APP_BASE + "api/signUpProcess.php", true);
    request.send(f);
}


function signIn() {

    var un = document.getElementById("un");
    var pw = document.getElementById("pw");
    var rm = document.getElementById("rm");

    var f = new FormData();
    f.append("u", un.value);
    f.append("p", pw.value);
    f.append("r", rm.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;

            if (response == "Success") {
                document.getElementById("msg2").innerHTML = "Login Successful";
                document.getElementById("msg2").className = "alert alert-success";
                document.getElementById("msgDiv2").className = "d-block";

                un.value = "";
                pw.value = "";

                window.location = APP_BASE + "index.php";

            } else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msgDiv2").className = "d-block";
            }
        }
    };

    request.open("POST", APP_BASE + "api/signInProcess.php", true);
    request.send(f);
}

function reload() {
    location.reload();
}

function printDiv() {
    var original = document.body.innerHTML;
    var printArea = document.getElementById("printArea").innerHTML;

    document.body.innerHTML = printArea;

    window.print();

    document.body.innerHTML = original;
}

function loadProduct(x) {

    var page = x;

    var f = new FormData();
    f.append("p", page);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;

            document.getElementById("pid").innerHTML = response;

        }
    };

    request.open("POST", APP_BASE + "api/loadProductProcess.php", true);
    request.send(f);

}

function searchProduct(x) {

    var page = x;
    var product = document.getElementById("product");

    var f = new FormData();
    f.append("p", product.value);
    f.append("pg", page);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;

            document.getElementById("pid").innerHTML = response;

        }
    };

    request.open("POST", APP_BASE + "api/searchProductProcess.php", true);
    request.send(f);

}

function viewFilter() {

    var filterElement = document.getElementById("filterId");

    if (filterElement.classList.contains("d-none")) {
        filterElement.classList.remove("d-none");
        filterElement.classList.add("d-block");

    } else {
        filterElement.classList.remove("d-block");
        filterElement.classList.add("d-none");
    }

}

function advSearchProduct(x) {

    var page = x;
    var color = document.getElementById("color").value;
    var cat = document.getElementById("cat").value;
    var brand = document.getElementById("brand").value;
    var series = document.getElementById("series").value;
    var min = document.getElementById("min").value;
    var max = document.getElementById("max").value;

    var f = new FormData();
    f.append("pg", page);
    f.append("co", color || 0);
    f.append("cat", cat || 0);
    f.append("b", brand || 0);
    f.append("s", series || 0);
    f.append("min", min || 0);
    f.append("max", max || 0);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;

            document.getElementById("pid").innerHTML = response;
        }
    };

    request.open("POST", APP_BASE + "api/advSearchProductProcess.php", true);
    request.send(f);
}

function uploadImg() {

    var img = document.getElementById("imgUploader");

    var f = new FormData();
    f.append("i", img.files[0]);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;

            if (response == "empty") {
                document.getElementById("msg").innerHTML = "Please Upload a Profile Image";
                document.getElementById("msgDiv").className = "d-block";

            } else {

                document.getElementById("i").src = response;
                img.value = "";

                document.getElementById("msg").innerHTML = "Profile Image uploaded successfully";
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgDiv").className = "d-block";
            }

        }
    };

    request.open("POST", APP_BASE + "api/profileImgUploadProcess.php", true);
    request.send(f);

}

function updateData() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var pw = document.getElementById("pw");
    var no = document.getElementById("no");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");

    var f = new FormData();
    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("m", mobile.value);
    f.append("p", pw.value);
    f.append("n", no.value);
    f.append("l1", line1.value);
    f.append("l2", line2.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;

            if (response == "Success") {
                document.getElementById("msg2").innerHTML = "Update Successful";
                document.getElementById("msg2").className = "alert alert-success";
                document.getElementById("msgDiv2").className = "d-block";

            } else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msgDiv2").className = "d-block";

            }
        };

    }

    request.open("POST", APP_BASE + "api/updateDataProcess.php", true);
    request.send(f);
}

function emptyWishlist(x) {

    var userId = x;

    Swal.fire({
        title: 'Are you sure?',
        text: 'Do you want to delete your wishlist?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Delete it!',
        cancelButtonText: 'No, keep it'
    }).then((result) => {
        if (result.isConfirmed) {
            var f = new FormData();
            f.append("id", userId);

            var request = new XMLHttpRequest();

            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    var response = request.responseText;

                    if (response == "Item Deleted Successfully") {
                        Swal.fire({
                            title: 'Deleted!',
                            text: 'All items of wishlist deleted successfully',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            reload();

                        });

                    } else {
                        Swal.fire({
                            title: 'Boom!',
                            text: 'Please Sign In first',
                            icon: 'error',
                            confirmButtonText: 'OK'

                        }).then(() => {
                            window.location = APP_BASE + "homepage.php";

                        });
                    }

                }
            };

            request.open("POST", APP_BASE + "api/emptywishlistProcess.php", true);
            request.send(f);
        }
    });
}

function signOut() {

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
                            confirmButtonText: 'OK'
                        }).then(() => {
                            window.location = APP_BASE + "index.php";

                        });

                    } else {
                        Swal.fire({
                            title: 'Boom!',
                            text: 'Please Sign In first',
                            icon: 'error',
                            confirmButtonText: 'OK'

                        }).then(() => {
                            window.location = APP_BASE + "homepage.php";

                        });
                    }

                }
            };

            request.open("POST", APP_BASE + "api/signOutProcess.php", true);
            request.send();
        }
    });
}

function loadCategory(catId, x) {

    var page = x;

    var f = new FormData();
    f.append("cat", catId);
    f.append("p", page);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;

            document.getElementById("pid").innerHTML = response;
        }
    };

    request.open("POST", APP_BASE + "api/loadCategoryProcess.php", true);
    request.send(f);

}

function addtoCart(x) {

    var stockId = x;
    var qty = document.getElementById("qty");

    if (qty.value > 0) {

        var f = new FormData();
        f.append("s", stockId);
        f.append("q", qty.value);

        var request = new XMLHttpRequest();

        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var response = request.responseText;

                if (response == "fail") {
                    Swal.fire({
                        title: 'Sorry!',
                        text: 'Please Sign In first',
                        icon: 'error',
                        confirmButtonText: 'OK'

                    }).then(() => {
                        qty.value = "";
                        window.location = APP_BASE + "homepage.php";

                    })

                } else if (response == "Cart Item Updated Successfully") {
                    Swal.fire({
                        title: 'Updated!',
                        text: 'Cart Item Updated Successfully',
                        icon: 'success',
                        confirmButtonText: 'Nice'
                    })
                    qty.value = "";

                } else if (response == "Stock Quantity has been exceeded!") {
                    Swal.fire({
                        title: 'Oops!',
                        text: 'Stock Quantity has been exceeded!',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    })
                    qty.value = "";

                } else if (response == "Item Added to Cart Successfully") {
                    Swal.fire({
                        title: 'Done!',
                        text: 'Item Added to Cart Successfully',
                        icon: 'success',
                        confirmButtonText: 'Good'
                    })
                    qty.value = "";

                } else if (response == "Your Stock is not Found") {
                    Swal.fire({
                        title: 'Sorry!',
                        text: 'Your Stock is not Found',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    })
                    qty.value = "";
                };

            }
        };

        request.open("POST", APP_BASE + "api/addtoCartProcess.php", true);
        request.send(f);

    } else if (qty.value == "") {
        Swal.fire({
            title: 'Wait!',
            text: 'Please Enter your Quantity',
            icon: 'error',
            confirmButtonText: 'OK'

        })

    } else if (qty.value == 0) {
        Swal.fire({
            title: 'Sorry!',
            text: 'Minimum Quantity is 1',
            icon: 'error',
            confirmButtonText: 'OK'
        })

    } else {
        Swal.fire({
            title: 'Oops!',
            text: 'Something went wrong',
            icon: 'error',
            confirmButtonText: 'OK'
        })
    }
}

function addtoCart2(x) {

    var stockId = x;
    var qty = document.getElementById("qty2");

    if (qty.value > 0) {

        var f = new FormData();
        f.append("s", stockId);
        f.append("q", qty.value);

        var request = new XMLHttpRequest();

        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var response = request.responseText;

                if (response == "fail") {
                    Swal.fire({
                        title: 'Sorry!',
                        text: 'Please Sign In first',
                        icon: 'error',
                        confirmButtonText: 'OK'

                    }).then(() => {
                        qty.value = "";
                        window.location = APP_BASE + "homepage.php";

                    })

                } else if (response == "Cart Item Updated Successfully") {
                    Swal.fire({
                        title: 'Updated!',
                        text: 'Cart Item Updated Successfully',
                        icon: 'success',
                        confirmButtonText: 'Nice'
                    }).then(() => {
                        qty.value = "";
                        window.location = APP_BASE + "cart.php";

                    })

                } else if (response == "Stock Quantity has been exceeded!") {
                    Swal.fire({
                        title: 'Oops!',
                        text: 'Stock Quantity has been exceeded!',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        qty.value = "";
                        reload();

                    })

                } else if (response == "Item Added to Cart Successfully") {
                    Swal.fire({
                        title: 'Done!',
                        text: 'Item Added to Cart Successfully',
                        icon: 'success',
                        confirmButtonText: 'Good'
                    }).then(() => {
                        qty.value = "";
                        window.location = APP_BASE + "cart.php";

                    })

                } else if (response == "Your Stock is not Found") {
                    Swal.fire({
                        title: 'Sorry!',
                        text: 'Your Stock is not Found',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        qty.value = "";
                        reload();

                    })

                };

            }
        };

        request.open("POST", APP_BASE + "api/addtoCartProcess.php", true);
        request.send(f);

    } else if (qty.value == "") {
        Swal.fire({
            title: 'Wait!',
            text: 'Please Enter your Quantity',
            icon: 'error',
            confirmButtonText: 'OK'

        })

    } else if (qty.value == 0) {
        Swal.fire({
            title: 'Sorry!',
            text: 'Minimum Quantity is 1',
            icon: 'error',
            confirmButtonText: 'OK'
        })

    } else {
        Swal.fire({
            title: 'Oops!',
            text: 'Something went wrong',
            icon: 'error',
            confirmButtonText: 'OK'
        })
    }
}

function addtoWishlist(x) {

    var stockId = x;
    var qty = 1;

    var f = new FormData();
    f.append("s", stockId);
    f.append("q", qty);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;

            if (response == "fail") {
                Swal.fire({
                    title: 'Sorry!',
                    text: 'Please Sign In first',
                    icon: 'error',
                    confirmButtonText: 'OK'

                }).then(() => {
                    window.location = APP_BASE + "homepage.php";

                })

            } else if (response == "Wishlist Item Updated Successfully") {
                Swal.fire({
                    title: 'Updated!',
                    text: 'Wishlist Item Updated Successfully',
                    icon: 'success',
                    confirmButtonText: 'Nice'
                })


            } else if (response == "Stock Quantity has been exceeded!") {
                Swal.fire({
                    title: 'Oops!',
                    text: 'Stock Quantity has been exceeded!',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })

            } else if (response == "Item Added to Wishlist Successfully") {
                Swal.fire({
                    title: 'Done!',
                    text: 'Item Added to Wishlist Successfully',
                    icon: 'success',
                    confirmButtonText: 'Good'
                })

            } else if (response == "Your Stock is not Found") {
                Swal.fire({
                    title: 'Sorry!',
                    text: 'Your Stock is not Found',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })
            };

        }
    };

    request.open("POST", APP_BASE + "api/addtoWishlistProcess.php", true);
    request.send(f);

}

function loadCart() {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;

            document.getElementById("cartBody").innerHTML = response;
        }
    };

    request.open("POST", APP_BASE + "api/loadCartProcess.php", true);
    request.send();

}

function loadWishlist() {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;

            document.getElementById("wishlistBody").innerHTML = response;
        }
    };

    request.open("POST", APP_BASE + "api/loadWishlistProcess.php", true);
    request.send();

}

function incrementCartQty(x) {

    var cartId = x;
    var qty = document.getElementById("qty" + x);
    var newQty = parseInt(qty.value) + 1;

    var f = new FormData();
    f.append("c", cartId);
    f.append("q", newQty);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;

            if (response == "Success") {
                qty.value = parseInt(qty.value) + 1;
                loadCart();

            } else if (response == "Product Quantity exceeded!") {
                Swal.fire({
                    title: 'Oops!',
                    text: 'Product Quantity exceeded!',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })

            } else {
                Swal.fire({
                    title: 'Sorry!',
                    text: 'Cart Item not Found',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })
            }

        }
    };

    request.open("POST", APP_BASE + "api/updateCartQtyProcess.php", true);
    request.send(f);
}

function incrementWishlistQty(x) {

    var wishlistId = x;
    var qty = document.getElementById("qty2" + x);
    var newQty = parseInt(qty.value) + 1;

    var f = new FormData();
    f.append("c", wishlistId);
    f.append("q", newQty);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;

            if (response == "Success") {
                qty.value = parseInt(qty.value) + 1;
                loadWishlist();

            } else if (response == "Product Quantity exceeded!") {
                Swal.fire({
                    title: 'Oops!',
                    text: 'Product Quantity exceeded!',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })

            } else {
                Swal.fire({
                    title: 'Sorry!',
                    text: 'Wishlist Item not Found',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })
            }

        }
    };

    request.open("POST", APP_BASE + "api/updateWishlistQtyProcess.php", true);
    request.send(f);
}

function decrementCartQty(x) {

    var cartId = x;
    var qty = document.getElementById("qty" + x);
    var newQty = parseInt(qty.value) - 1;

    var f = new FormData();
    f.append("c", cartId);
    f.append("q", newQty);

    if (newQty > 0) {
        var request = new XMLHttpRequest();

        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var response = request.responseText;

                if (response == "Success") {
                    qty.value = parseInt(qty.value) - 1;
                    loadCart();

                } else if (response == "Cart Item not Found") {
                    Swal.fire({
                        title: 'Oops!',
                        text: 'Cart Item not Found',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    })

                } else {
                    Swal.fire({
                        title: 'Sorry!',
                        text: 'Something went wrong',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    })
                }
            }
        };

        request.open("POST", APP_BASE + "api/updateCartQtyProcess.php", true);
        request.send(f);
    }

}

function decrementWishlistQty(x) {

    var wishlistId = x;
    var qty = document.getElementById("qty2" + x);
    var newQty = parseInt(qty.value) - 1;

    var f = new FormData();
    f.append("c", wishlistId);
    f.append("q", newQty);

    if (newQty > 0) {
        var request = new XMLHttpRequest();

        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var response = request.responseText;

                if (response == "Success") {
                    qty.value = parseInt(qty.value) - 1;
                    loadWishlist();

                } else if (response == "Wishlist Item not Found") {
                    Swal.fire({
                        title: 'Oops!',
                        text: 'Wishlist Item not Found',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    })

                } else {
                    Swal.fire({
                        title: 'Sorry!',
                        text: 'Something went wrong',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    })
                }
            }
        };

        request.open("POST", APP_BASE + "api/updateWishlistQtyProcess.php", true);
        request.send(f);
    }

}


function removeCart(x) {

    Swal.fire({
        title: 'Are you sure?',
        text: 'Do you want to delete this item?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, keep it'
    }).then((result) => {
        if (result.isConfirmed) {
            var f = new FormData();
            f.append("c", x);

            var request = new XMLHttpRequest();

            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    var response = request.responseText;

                    Swal.fire({
                        title: 'Deleted!',
                        text: response,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        reload();
                    })
                }
            };

            request.open("POST", APP_BASE + "api/removeCartProcess.php", true);
            request.send(f);
        }
    });
}

function removeWishlist(x) {

    Swal.fire({
        title: 'Are you sure?',
        text: 'Do you want to delete this item?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, keep it'
    }).then((result) => {
        if (result.isConfirmed) {
            var f = new FormData();
            f.append("c", x);

            var request = new XMLHttpRequest();

            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    var response = request.responseText;

                    Swal.fire({
                        title: 'Deleted!',
                        text: response,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        reload();
                    })
                }
            };

            request.open("POST", APP_BASE + "api/removeWishlistProcess.php", true);
            request.send(f);
        }
    });
}


function checkOut() {

    var f = new FormData();
    f.append("cart", true);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;

            var payment = JSON.parse(response);
            doCheckout(payment, APP_BASE + "api/checkoutProcess.php");

            if (response == "out") {
                Swal.fire({
                    title: 'Sorry!',
                    text: 'Out of Stock',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })

            }
        }
    };

    request.open("POST", APP_BASE + "api/paymentProcess.php", true);
    request.send(f);
}

function doCheckout(payment, path) {

    // Payment completed. It can be a successful failure.
    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);
        // Note: validate the payment and show success or failure page to the customer
        var f = new FormData();
        f.append("payment", JSON.stringify(payment));

        var request = new XMLHttpRequest();

        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var response = request.responseText;

                var order = JSON.parse(response);

                if (order.resp == "Success") {
                    Swal.fire({
                        title: 'Good Job!',
                        text: 'Thank you for shopping with us',
                        icon: 'success',
                        confirmButtonText: 'You are Welcome'
                    }).then(() => {
                        window.location = APP_BASE + "invoice.php?orderId=" + order.order_id;
                    })

                } else if (response == "fail") {
                    Swal.fire({
                        title: 'Oops!',
                        text: 'Something went wrong',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    })
                }

            }
        };

        request.open("POST", path, true);
        request.send(f);

    };

    // Payment window closed
    payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
    };

    // Error occurred
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:" + error);
    };

    // Show the payhere.js popup, when "PayHere Pay" is clicked
    // document.getElementById('payhere-payment').onclick = function (e) {
    payhere.startPayment(payment);
    // };
}

function buyNow(stockId) {

    var qty = document.getElementById("qty");

    if (qty.value > 0) {

        var f = new FormData();
        f.append("cart", false);
        f.append("stockId", stockId);
        f.append("qty", qty.value);

        var request = new XMLHttpRequest();

        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var response = request.responseText;

                if (response == "fail") {
                    Swal.fire({
                        title: 'Sorry!',
                        text: 'Please Sign In first',
                        icon: 'error',
                        confirmButtonText: 'OK'

                    }).then(() => {
                        qty.value = "";
                        window.location = APP_BASE + "homepage.php";

                    })

                }

                var payment = JSON.parse(response);
                payment.stock_id = stockId;
                payment.qty = qty.value;

                doCheckout(payment, APP_BASE + "api/buynowProcess.php");
            }
        };

        request.open("POST", APP_BASE + "api/paymentProcess.php", true);
        request.send(f);

    } else if (qty.value == "") {
        Swal.fire({
            title: 'Wait!',
            text: 'Please Enter your Quantity',
            icon: 'error',
            confirmButtonText: 'OK'

        })

    } else if (qty.value == 0) {
        Swal.fire({
            title: 'Sorry!',
            text: 'Minimum Quantity is 1',
            icon: 'error',
            confirmButtonText: 'OK'
        })

    } else {
        Swal.fire({
            title: 'Oops!',
            text: 'Something went wrong',
            icon: 'error',
            confirmButtonText: 'OK'
        })
    }
}

function forgetPassword() {
    var email = document.getElementById("e");

    if (email.value != "") {

        var f = new FormData();
        f.append("e", email.value);

        var request = new XMLHttpRequest();

        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var response = request.responseText;

                if (response == "Success") {
                    // email sent
                    Swal.fire({
                        title: 'Email Sent',
                        text: 'Please check your mail box',
                        icon: 'success',
                        confirmButtonText: 'OK'

                    }).then(() => {
                        email.value = "";
                    })

                } else if (response == "fail") {
                    Swal.fire({
                        title: 'Sorry!',
                        text: 'User not found',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        email.value = "";
                    })
                }
            }
        };

        request.open("POST", APP_BASE + "api/forgetPasswordProcess.php", true);
        request.send(f);

    } else {
        // invalid email
        Swal.fire({
            title: 'Oops!',
            text: 'Please Enter Your Valid Email',
            icon: 'error',
            confirmButtonText: 'OK'
        })
    }
}

function resetPassword() {
    var vcode = document.getElementById("vcode");
    var np = document.getElementById("np");
    var np2 = document.getElementById("np2");

    if (!np.value || !np2.value) {
        Swal.fire({
            title: 'Oops!',
            text: 'Please enter your new password and confirm it',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    var f = new FormData();
    f.append("vcode", vcode.value);
    f.append("np", np.value);
    f.append("np2", np2.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;

            if (response == "success") {
                Swal.fire({
                    title: 'Job Done!',
                    text: 'Password Changed Successfully',
                    icon: 'success',
                    confirmButtonText: 'Nice'
                }).then(() => {
                    np.value = "";
                    np2.value = "";
                    window.location = APP_BASE + "signIn.php";
                });

            } else if (response == "nomatch") {
                Swal.fire({
                    title: 'Oops!',
                    text: 'Passwords don\'t match',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });

            } else if (response == "nofound") {
                Swal.fire({
                    title: 'Sorry!',
                    text: 'User not Found',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        }
    };

    request.open("POST", APP_BASE + "api/resetPasswordProcess.php", true);
    request.send(f);
}

function back5() {
    window.location = APP_BASE + "index.php";
}

