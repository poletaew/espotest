Espo.define('test:views/dashlets/test', 'views/dashlets/abstract/base', function (Dep) {

	return Dep.extend({
		template: 'test:dashlets/test',

		events: {
			'click .send-test-email': function () {
				this.send(this.$el.find('#test-email').val());
			}
		},

		showSuccess: function (text) {
			$('.test-email-success').text(text);
		},

		showError: function (text) {
			$('.test-email-error').text(text);
		},

		send: function (email) {
			$('.test-email-success').text('');
			$('.test-email-error').text('');

			$.post('Test/action/sendEmail', JSON.stringify({email: email}))
				.done(function (res) {
					if (res.success) {
						this.showSuccess('Письмо отправлено на адрес ' + email);
					} else {
						this.showError('Не удалось отправить поисьмо на адрес ' + email);
					}
				}.bind(this))
				.fail(function (xhr, textStatus) {
					this.showError(textStatus);
				}.bind(this))
			;
		}
	});
});