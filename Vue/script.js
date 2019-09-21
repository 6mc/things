var users = [
  {id: 1, name: 'Mehmet', adress: "World"},
  {id: 2, name: 'Ali', adress: "Mersin"},
  {id: 3, name: 'Ayse', adress: "Talinn"}
  ];

var statuses =  [
    { key: 'admin', text: 'Admin' },
    { key: 'super-admin', text: 'Super Admin' }
];
var products = [
  {id: 1, name: 'Coca Cola', price: 100}
  ];

var orders = [
  {id: 1, user: 'Mehmet', product: 'Coca Cola', price: 100, quantity: 1, total:100,  date:"21.09.2019 18:00"},
  {id: 2, user: 'Alex', product: 'Superheroic JavaScript MVW Framework.', price: 100, quantity: 1, total:100,  date:"21.09.2019 18:00"},
  {id: 3, user: 'Diego', product: 'Superheroic JavaScript MVW Framework.', price: 100, quantity: 1, total:100,  date:"21.09.2019 18:00"}
];

function findorder (orderId) {
  return orders[findorderKey(orderId)];
};

function findorderKey (orderId) {
  for (var key = 0; key < orders.length; key++) {
    if (orders[key].id == orderId) {
      return key;
    }
  }
};

var List = Vue.extend({
  template: '#order-list',
  data: function () {
    return {orders: orders, searchKey: ''};
  },
  computed: {
    filteredorders: function () {
      return this.orders.filter(function (order) {
        return this.searchKey=='' || order.user.indexOf(this.searchKey) !== -1;
      },this);
    }
  }
});

var order = Vue.extend({
  template: '#order',
  data: function () {
    return {order: findorder(this.$route.params.order_id)};
  }
});

var orderEdit = Vue.extend({
  template: '#order-edit',
  data: function () {
    return {order: findorder(this.$route.params.order_id)};
  },
  methods: {
    updateorder: function () {
      var order = this.order;
      orders[findorderKey(order.id)] = {
        id: order.id,
        user: order.user,
        description: order.description,
        price: order.price
      };
      router.push('/');
    }
  }
});

var orderDelete = Vue.extend({
  template: '#order-delete',
  data: function () {
    return {order: findorder(this.$route.params.order_id)};
  },
  methods: {
    deleteorder: function () {
      orders.splice(findorderKey(this.$route.params.order_id), 1);
      router.push('/');
    }
  }
});

var Addorder = Vue.extend({
  template: '#add-order',
  data: function () {
    return {order: {user: '', product: '', quantity: ''}}
  },
  methods: {
    createorder: function() {
      var order = this.order;
      orders.push({
        id: Math.random().toString().split('.')[1],
        user: order.user,
        product: order.product,
        quantity: order.quantity
        // Ajax Response will be the total price and price and date
      });
      router.push('/');
    }
  }
});

var router = new VueRouter({routes:[
  { path: '/', component: List},
  { path: '/order/:order_id', component: order, user: 'order'},
  { path: '/add-order', component: Addorder},
  { path: '/order/:order_id/edit', component: orderEdit, user: 'order-edit'},
  { path: '/order/:order_id/delete', component: orderDelete, user: 'order-delete'}
]});
app = new Vue({

  router:router
}).$mount('#app')