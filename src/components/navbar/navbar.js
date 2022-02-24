import React, { Component } from "react";
import { Link } from "react-router-dom";

export default class Navbar extends Component {
    render() {
        return(
            <div className="navbar">
                <div className="name">
                    <Link to='/' className="brand-name">Project Alpha</Link>
                </div>
                <ul className="nav">
                    <li>
                        <Link to="/discover" className="nav-item">Discover</Link>
                    </li>
                    <li>
                        <Link to="/apps" className="nav-item">Apps</Link>
                    </li>
                    <li>
                        <Link to="/contact" className="nav-item">Contact</Link>
                    </li>
                    <li>
                        <Link to="/about" className="nav-item">About</Link>
                    </li>
                </ul>
            </div>
        )
    }
}