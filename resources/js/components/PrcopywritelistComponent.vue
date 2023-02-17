<template>
    <v-data-table
        :headers="headers"
        :items="desserts"
        sort-by="calories"
        class="elevation-1"
    >
        <template v-slot:top>
            <v-toolbar >
                <v-toolbar-title>PR Copywrite List</v-toolbar-title>
                <v-divider
                    class="mx-4"
                    inset
                    vertical
                ></v-divider>
                <v-spacer></v-spacer>
                <v-dialog v-model="dialog" max-width="500px">
                    <template v-slot:activator="{ on, attrs }">
                        <v-btn
                            color="primary"
                            dark
                            class="mb-2"
                            v-bind="attrs"
                            v-on="on"
                        >Request New One</v-btn>
                    </template>
                    <v-card>
                        <v-card-title>
                            <span class="headline">{{ formTitle }}</span>
                        </v-card-title>

                        <v-card-text>
                            <v-container>
                                <v-row>
                                    <v-col cols="12" sm="6" md="4">
                                        <v-text-field v-model="editedItem.ticket_no" label="Ticket No"></v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="6" md="4">
                                        <v-text-field v-model="editedItem.name" label="Name Or Title"></v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="6" md="4">
                                        <v-text-field v-model="editedItem.submitted_at" label="Submitted At"></v-text-field>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-card-text>

                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn color="blue darken-1" text @click="close">Cancel</v-btn>
                            <v-btn color="blue darken-1" text @click="save">Save</v-btn>
                        </v-card-actions>
                    </v-card>
                </v-dialog>
            </v-toolbar>
        </template>
        <template v-slot:item.actions="{ item }">
            <v-icon
                small
                class="mr-2"
                @click="editItem(item)"
            >
                mdi-pencil
            </v-icon>
            <v-icon
                small
                @click="deleteItem(item)"
            >
                mdi-delete
            </v-icon>
        </template>
        <template v-slot:no-data>
            <v-btn color="primary" @click="initialize">Reset</v-btn>
        </template>
    </v-data-table>
</template>

<script>
    export default {
        data: () => ({
            dialog: false,
            userName:'',
            headers: [
                {text:'Ticket No',  align: 'start',value:'ticket_no'},
                { text: 'Name / Title',value: 'name'},
                { text: 'Submitted At', value: 'submitted_at' },
                { text: 'Actions', value: 'actions', sortable: false },
            ],
            desserts: [],
            editedIndex: -1,
            editedItem: {
                ticket_no: 'Ticket 123',
                name: "Covid 19",
                submitted_at:'04-Jul-2020'
            },
            defaultItem: {
                ticket_no: 'Ticket 123',
                name: "Covid 19",
                submitted_at:'04-Jul-2020'
            },
        }),

        computed: {
            formTitle () {
                return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
            },
        },
        mounted(){
            apiService.hitshowupdateUserApi()
            .then(resp=> {
                this.userName = resp.name;
                
            })
            .catch( err=> {
                localStorage.removeItem('token');
                localStorage.removeItem('user_obj');
                this.$router.push({name:'Login'})
                    .then(res => console.log('logged out successfully!'))
                    .catch(err => console.log(err))
                
            });
        },
        watch: {
            dialog (val) {
                val || this.close()
            },
        },

        created () {
            this.initialize()
        },

        methods: {
            initialize () {
                        this.desserts = [  
                        ],
                
                this.loader=true;
                axios.interceptors.request.use((config) => {
                    this.loading = true;
                    return config;
                }, (error) => {
                    this.loading = false;
                    return Promise.reject(error);
                });

                // Add a response interceptor
                axios.interceptors.response.use((response) => {
                    this.loading = false;
                    return response;
                }, (error) => {
                    this.loading = false;
                    return Promise.reject(error);
                });
            },

            editItem (item) {
                this.editedIndex = this.desserts.indexOf(item)
                this.editedItem = Object.assign({}, item)
                this.dialog = true
            },

            deleteItem (item) {
                const index = this.desserts.indexOf(item)
                confirm('Are you sure you want to delete this item?') && this.desserts.splice(index, 1)
            },

            close () {
                this.dialog = false
                this.$nextTick(() => {
                    this.editedItem = Object.assign({}, this.defaultItem)
                    this.editedIndex = -1
                })
            },

            save () {
                if (this.editedIndex > -1) {
                    Object.assign(this.desserts[this.editedIndex], this.editedItem)
                } else {
                    this.desserts.push(this.editedItem)
                }
                this.close()
            },
        },
    }
</script>
