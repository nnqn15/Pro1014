<div class="page-header">
	<div class="container d-flex flex-column align-items-center">
		<nav aria-label="breadcrumb" class="breadcrumb-nav">
			<div class="container">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="demo4.html">Trang chủ</a></li>
					<li class="breadcrumb-item"><a href="category.html">Tài khoản</a></li>
					<li class="breadcrumb-item active" aria-current="page">
						Đăng ký
					</li>
				</ol>
			</div>
		</nav>

		<h1 class="mt-2">Đăng ký tài khoản</h1>
	</div>
</div>

<div class="container  login-container">
	<div class=" mt-2 mx-auto">

		<?php if (isset($_SESSION['error']['register'])): ?>
			<h5 class="alert alert-danger">
				<?= $_SESSION['error']['register'] ?>
			</h5>
		<?php endif;
		unset($_SESSION['error']['register']) ?>

		<?php if (isset($_SESSION['success']['register'])): ?>
			<h5 class="alert alert-success">
				<?= $_SESSION['success']['register'] ?>
			</h5>
		<?php endif;
		unset($_SESSION['success']['register']) ?>

		<form action="#" method="post" id="form_register">

			<div class="mb-2">
				<label for="fullname">
					Họ và tên
					<span class="required">*</span>
				</label>
				<input type="text" name="fullname" class="form-input form-wide" id="fullname">
			</div>

			<div class="mb-2">
				<label for="register-email">
					Địa chỉ Email
					<span class="required">*</span>
				</label>
				<input type="text" name="email" class="form-input form-wide" id="register-email">
			</div>

			<div class="mb-2">
				<label for="register-phone">
					Số điện thoại
					<span class="required">*</span>
				</label>
				<input type="text" name="number_phone" class="form-input form-wide" id="register-phone"  pattern="[0-9]{10}">
			</div>

			<div class="mb-2">
				<label for="password">
					Mật khẩu
					<span class="required">*</span>
				</label>
				<input type="password" name="password" class="form-input form-wide" id="password">
			</div>

			<div class="mb-2">
				<label for="re_password">
					Nhập lại mật khẩu
					<span class="required">*</span>
				</label>
				<input type="password" name="re_password" class="form-input form-wide" id="re_password">
			</div>

			<div class="mb-2">
				<label for="address">
					Địa chỉ
					<span class="required">*</span>
				</label>
				<input type="text" name="address" class="form-input form-wide" id="address">
			</div>


			<div class="form-footer">
				Bạn đã có tài khoản? <a href="<?= $base_url ?>user/login" class="forget-password text-danger"> Đăng
					nhập</a>
			</div>

			<input name="btn_register" value="Đăng ký" type="submit" class="btn btn-primary btn-md w-100 ">
		</form>
	</div>
</div>


<!-- ajax register form -->
<script>
	$(document).ready(
		function () {

			$("#register-phone").on("keyup", function () {
				var value = $(this).val();
				value = value.replace(/[^0-9]/g, ""); // Loại bỏ các ký tự không phải số
				$(this).val(value);
			});

			$("#form_register").validate({
				rules: {
					fullname: {
						required: true,
					},
					email: {
						required: true,
						email: true,
					},
					number_phone: {
						required: true,
						maxlength: 10,
						minlength: 10,
					},
					password: {
						required: true,
						minlength: 8,
					},
					re_password: {
						equalTo: "#password",
					},
					address: {
						required: true,
					}
				},

				messages: {
					fullname: {
						required: "Vui lòng nhập họ tên",
					},
					email: {
						required: "Vui lòng nhập địa chỉ email",
						email: "Địa chỉ không phải email",
					},
					number_phone: {
						required: "Vui lòng nhập số điện thoại",
						maxlength: "Nhập tối đa 10 số",
						minlength: "Nhập tối thiểu 10 số"
					},
					password: {
						required: "Vui lòng nhập mật khẩu",
						minlength: "Mật khẩu tối thiểu 8",
					},
					re_password: {
						equalTo: "Mật khẩu không trùng khớp",
					},
					address: {
						required: "Vui lòng nhập địa chỉ",
					}
				},
				submitHandler: function (form) {
					$.ajax({
						type: "POST",
						url: "?mod=user&act=register",
						data: {
							fullname: fullname,
							email: email,
							password: password,
							number_phone: number_phone,
						},

					})

				}
			})

		})

</script>