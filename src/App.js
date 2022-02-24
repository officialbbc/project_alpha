import { BrowserRouter, Routes, Route } from 'react-router-dom';
import './styles/style.css'
import Footer from './components/footer/footer';
import Navbar from './components/navbar/navbar';
import Discover from './components/discover/discover';
import Home from './components/home/home';
import Apps from './components/apps/apps';
import Contact from './components/contact/contact';
import About from './components/about/about';

function App() {
  return (
    <BrowserRouter>
      <Navbar />
      <div className="container">
        <Routes>
          <Route path="/" element={<Home />}></Route>
          <Route path="/discover" element={<Discover />}></Route>
          <Route path="/apps" element={<Apps />}></Route>
          <Route path="/contact" element={<Contact />}></Route>
          <Route path="/about" element={<About />}></Route>
        </Routes>
      </div>
      <Footer />
    </BrowserRouter>
  );
}

export default App;
