<template>
	<div>
		<div v-if="error" class="error-message">
		<p v-text="error"></p>
		</div>
		<div v-if="success" class="success-message">
		<p v-text="success"></p>
		</div>
		<div class="markappboxing">
            <div class="markappheader">
                <h5>User Create</h5>
            </div>
            <div class="markappbody">
                <div class="userformdata">
                    <div class="form-group custom-form-group">
                        <label for="name">Username <span style="color:red;">*</span></label>
                        <input type="text" required class="form-control" v-model="uploadUser.name" placeholder="Enter Users"/>
                        <span style='color:red;font-size: .8em' v-text="errors.name"></span>
                    </div>
                    <div class="form-group-flex">
                        <div class="form-group custom-form-group">
                            <label for="email">Email <span style="color:red;">*</span></label>
                            <input type="email" required v-model="uploadUser.email" class="form-control" placeholder="Enter Email address" />
                        	<span style='color:red;font-size: .8em' v-text="errors.email"></span>
                        </div>
                        <div class="form-group custom-form-group">
                            <label for="name">Phone <span style="color:red;">*</span></label>
                            <input type="text" required class="form-control" v-model="uploadUser.phone" @input="acceptNumber" placeholder="Enter Phone" />
                            <span style='color:red;font-size: .8em' v-text="errors.phone"></span>
                        </div>
                    </div>
                    <div class="form-group-flex">
                        <div class="form-group custom-form-group">
                            <label for="gender">Gender <span style="color:red;">*</span></label>
                            <select v-model="uploadUser.gender" class="form-control">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <span style='color:red;font-size: .8em' v-text="errors.gender"></span>
                        </div>
                    </div>
                    <div class="form-group-flex">
                        <div class="form-group custom-form-group">
                            <label for="password">Password <span style="color:red;">*</span></label>
                            <input type="password" v-model="uploadUser.password" placeholder="Enter Password" class="form-control"/>
                            <span style='color:red;font-size: .8em' v-text="errors.password"></span>
                        </div>
                    </div>
                    <div class="form-group custom-form-group">
                    	<div class="imageframe">
                    		<img v-if="!hasAvatar" src="/uploads/Default-avatar.jpeg" />
                    		<img v-if="hasAvatar" :src="fileImgPreview.src" />
                    	</div>
                        <label for="avatar">User Avatar <span style="color:red;">*</span></label>
                        <input type="file" placeholder="Enter Password" class="form-control" @change.prevent="showUploadIMG"/>
                    </div>                    
                </div>
            </div>
            <div class="markappfooter">
                <div class="action-button-process">
                    <div class="form-group">
                        <button type="button" class="isAction form-control" data-bs-toggle="modal" data-bs-target="#myModal">Create New</button>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">User Record</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="asktouser">
                                            <p>Are you sure want to create record?</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="closeNow" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" @click.prevent="createRecordOne">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
<!--                     <div class="form-group">
                        <button type="button" class="isAction form-control">Clear</button>
                    </div>      -->                 
                </div>
              
            </div>
        </div>
	</div>
</template>
<script>
export default {
	data() {
		return {
			hasAvatar: false,
			fileImgPreview: '',
			uploadFileArray: null,
			uploadUser: {
				name: '',
				email: '',
				password: '',
				phone: '',
				avatar: '',
				gender: 'male',				
			},
			errors: {
				name: '', //Enter your account name',
				password: '', //Enter your password',
				email: '',//Enter your email',
				phone: '',//Enter your phone',
				gender: '',//Selected your gender type'
			},
			success: "",
			error: ""
		}
	},
	methods: {
		acceptNumber() {
		    var x = this.uploadUser.phone.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
				this.uploadUser.phone = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
		},
		validEmail: function (email) {
			var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return re.test(email);
		},
		showUploadIMG() {
			/*
		    if (event.lengthComputable) { 
		      console.log('hi there', event.loaded / event.total * 100); 
		    } 
		    */		

		    var file = event.target.files[0];
            let img = {
                src: URL.createObjectURL(file),
                file: file,
            };
            this.hasAvatar = true;
            this.fileImgPreview = img;
            this.uploadFileArray = event.target.files[0];
		},

		createRecordOne() {
			let data = new FormData();
			data.append('name', this.uploadUser.name);
			data.append('email', this.uploadUser.email);
			data.append('password', this.uploadUser.password);
			data.append('phone', this.uploadUser.phone);
			data.append('gender', this.uploadUser.gender);
			data.append('photo', this.uploadFileArray);
			const headers = {
                headers: {
                    'Content-Type': 'multipart/form-data',
                }
			};
			if(
				this.uploadUser.name == "" || this.uploadUser.email == "" || 
				this.uploadUser.phone == "" || this.uploadUser.gender == "" || this.uploadUser.password == ""
			) {
				this.errors = {
					name: (this.uploadUser.name == "") ? 'Enter your account name' : '',
					email: (!this.validEmail(this.uploadUser.email)) ? 'Enter your account email' : '',
					password: (this.uploadUser.password == "") ? 'Enter your account password' : '',
					phone: (this.uploadUser.phone == "") ? 'Enter your phone number' : ''
				};

				document.querySelector('#closeNow').click();
			} else {
				axios.post('/betterhr/userlist/create', data, headers)
				.then((resp) => {
					document.querySelector('#closeNow').click();
					if(resp.data.status) {
						this.success = resp.data.message;
						this.errors = {
							name: '', //Enter your account name',
							password: '', //Enter your password',
							email: '',//Enter your email',
							phone: '',//Enter your phone',
							gender: '',//Selected your gender type'
						};	
						this.uploadUser = {
							name: '',
							email: '',
							password: '',
							phone: '',
							avatar: '',
							gender: 'male',				
						};
						this.hasAvatar = false;
						var setTime = setTimeout(() => {
                        	this.success = null;
                    	}, 3000);  
					} else {
						this.error = resp.data.message;
						this.errors = {
							name: '', //Enter your account name',
							password: '', //Enter your password',
							email: '',//Enter your email',
							phone: '',//Enter your phone',
							gender: '',//Selected your gender type'
						};	
						var setTime = setTimeout(() => {
                        	this.error = null;
                    	}, 3000);  											
					}
					
				})
				.catch((error) => {

				})
			}
		}
	}
}
</script>