import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class MainMenu extends Component {
    constructor(props) {
        super(props);
        this.pizzas = {
            list: myData
        };
        this.cart = [];
        this.addToCart = this.addToCart.bind(this);
        this.SendCartData = this.SendCartData.bind(this);
    }


    async SendCartData(data) {
        const url = '/test';

        try {
            const response = await fetch(url, {
                method: 'POST',
                body: data,
                headers: {
                    'Content-Type': 'application/json'
                }
            });
            window.location = '/cart';
            console.log('Success:', response);

        } catch (error) {
            console.error('Error:', error);
        }
    }
/*
    SendCartData(data){
        axios.post('/test', JSON.stringify(data))
            .then(function (response) {
                console.log(response);
                // window.location='/cart';

            })
            .catch(function (error) {
                console.log(error);
            });
    }*/


  /*  SendCartData(data){
        const request = new XMLHttpRequest();
        request.open('POST', '/test', true);
        request.setRequestHeader('Content-Type', 'application/json; charset=UTF-8');
        request.send(data);
        console.log()
    }*/
/*
   SendCartData(data){
       fetch('/test/', {
           method: 'POST',
           async: true,
           headers: {
               Accept: 'application/json',
               'Content-Type': 'application/json',
           },
           body: data,
       });
   }*/

    addToCart(elem, price){
        let obj = {
            id:elem,
            quant:1,
            price_usd: price*1, // use *1 to convert from string to number
            price_eur: (price*0.9).toFixed(2)*1
        };

        //check if already in cart and change quantity & priceif is
        if(this.cart.findIndex(x => x.id === elem) != -1){
            this.cart.find(x => x.id === elem).quant++;
            this.cart.find(x => x.id === elem).price_usd = this.cart.find(x => x.id === elem).quant*price;
        }else{ //add to cart if not
            this.cart.push(obj);
        }
        console.log(this.cart);

    }



    render() {

        return (
            <div>
                {this.pizzas.list.map(item => (
                    <div className="pizzaColumn" key={item.id}>
                        <h2>{item.name}</h2>
                        <p><img src={'/images/pizza/' + item.image_addr } width="200" height="200" alt=""/></p>
                        <p>{item.description}</p>
                        <span className="button"><a href={'/pizza/' + item.id }>Read more</a></span>
                        <span className="button buy" onClick={ () => this.addToCart(item.id, item.price) }>
                            <a href="#">Buy ({item.price}$)</a>
                        </span>
                    </div>
                ))}
                <button onClick={ () => this.SendCartData(this.cart)}>test</button>
            </div>
        );
    }
}


export default MainMenu
if (document.getElementById('mainMenu')) {
    ReactDOM.render(<MainMenu />, document.getElementById('mainMenu'));
}



