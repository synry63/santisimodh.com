<?

echo layout::table('users',
										array('number',
													'ID',
													'name',
													'last-name',
													'email',
													'edit',
													'delete',
													'search',
												),
										array('number'=>lang('Users'),
													'name'=>lang('Name'),
													'last-name'=>lang('Last Name'),
													'email'=>lang('E-Mail'),
													'edit'=>lang('Edit'),
													'delete'=>lang('Delete'),
												),
										FALSE,
										array('limit'=>10,
													'search'=>array('name',
																					'last-name',
																					'email',
																				)
												)
				);

?>