//Modal delete User
function delete_Modal(user) {
			let content = `
											<input type="hidden" name="id" value="${user.id}"/>
											`;
			$("#modal-content").html(content);
			$("#modal").modal("show");
	}

