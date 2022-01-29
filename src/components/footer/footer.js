import React, { Component } from "react";
import { Link } from "react-router-dom";

export default class Footer extends Component {
    render() {
        return(
            <div className="footer">
                <div className="footer-icons">
                <Link to=''>
                    <i className='bx bxl-github'></i></Link>
                <Link to="">
                    <i className='bx bxl-discord-alt' ></i>
                </Link>
                <Link to="">
                    <i className='bx bxl-facebook-circle' ></i>
                </Link>
                <Link to="">
                    <i className='bx bxl-instagram-alt' ></i>
                </Link>
                </div>
                <div className="footer-text">
                    Copyright &copy; 2022 BBC Official
                </div>
            </div>
        )
    }
}