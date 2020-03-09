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
    }



    addToCart(elem, price, name){
        let obj = {
            id:elem,
            name:name,
            quant:1,
            price_usd: price*1, // use *1 to convert from string to number
            price_eur: (price*0.9).toFixed(2)*1
        };

        //check if already in cart and change quantity & price if is
        if(this.cart.findIndex(x => x.id === elem) != -1){
            this.cart.find(x => x.id === elem).quant++;
            this.cart.find(x => x.id === elem).price_usd =
                this.cart.find(x => x.id === elem).quant*price;
            this.cart.find(x => x.id === elem).price_eur=
                (this.cart.find(x => x.id === elem).quant*price*0.9).toFixed(2)*1;
        }else{ //add to cart if not
            this.cart.push(obj);
        }
        console.log(this.cart);
        document.getElementById('cartBtn')
            .setAttribute('href', '/cart?cartData='+JSON.stringify(this.cart));
    }



    render() {

        return (
            <div>
                {this.pizzas.list.map(item => (
                    <div className="pizzaColumn" key={item.id}>
                        <h2>{item.name}</h2>
                        <span>
                             <img src={item.type === '2' ? '"/images/pepper.png"/>' : ''} />
                        </span>
                        <p><img src={'/images/pizza/' + item.image_addr } width="200" height="200" alt=""/></p>
                        <p>{item.description}</p>
                        <span className="button"><a href={'/pizza/' + item.id }>Read more</a></span>
                        <span className="button buy" onClick={ () => this.addToCart(item.id, item.price, item.name) }>
                            <a href="#">Buy ({item.price}$)</a>
                        </span>
                    </div>
                ))}
            </div>
        );
    }
}


export default MainMenu
if (document.getElementById('mainMenu')) {
    ReactDOM.render(<MainMenu />, document.getElementById('mainMenu'));
}



