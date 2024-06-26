import {
    faLaravel,
    faBootstrap,
    faPhp,
    faSymfony,
    faMagento,
    faLess,
    faHtml5,
    faShopify,
    faVuejs,
    faReact,
    faAws,
    faWordpress,
    faAngular,
    faPython
} from '@fortawesome/free-brands-svg-icons'
import {
    faCode,
    faInfo,
    faIndustry,
    faDesktop,
    faPlane,
    faCoins,
    faGlobe,
    faPalette, faCodeCompare, faSignHanging, faCalendarWeek, faArrowCircleLeft, faPlus
} from "@fortawesome/free-solid-svg-icons";

const icons = [
    {name:'faLaravel',icon:faLaravel},
    {name:'faBootstrap',icon:faBootstrap},
    {name:'faPhp',icon:faPhp},
    {name:'faSymfony',icon:faSymfony},
    {name:'faMagento',icon:faMagento},
    {name:'faLess',icon:faLess},
    {name:'faHtml5',icon:faHtml5},
    {name:'faShopify',icon:faShopify},
    {name:'faVuejs',icon:faVuejs},
    {name:'faReact',icon:faReact},
    {name:'faAws',icon:faAws},
    {name:'faWordpress',icon:faWordpress},
    {name:'faAngular',icon:faAngular},
    {name:'faPython',icon:faPython},
    {name: 'faCode',icon: faCode},
    {name: 'faInfo',icon:faInfo},
    {name: 'faIndustry',icon:faIndustry},
    {name: 'faDesktop',icon:faDesktop},
    {name: 'faPlane',icon:faPlane},
    {name: 'faCoins',icon:faCoins},
    {name: 'faGlobe',icon:faGlobe},
    {name: 'faPalette',icon:faPalette},
    {name: 'faCodeCompare',icon:faCodeCompare},
    {name: 'faSignHanging',icon:faSignHanging},
    {name: 'faCalendarWeek',icon:faCalendarWeek},
    {name: 'faArrowCircleLeft',icon:faArrowCircleLeft},
    {name: 'faPlus',icon:faPlus}
]

const getBrandIcon = (brand) => {
    let icon = icons.filter( (ico) => {
        return ico.name === brand
    });

    if(icon.length === 0){
        return faCode
    }

    return icon[0].icon;
}

export default getBrandIcon;
