
import React from "react"
import MUIDataTable from "mui-datatables"
import Button from "@mui/material/Button";
import {EditAttributes} from "@mui/icons-material";
import {Link} from "react-router-dom";

const ContactData = () => {

    const columns = [
        {
            name:'id',
            label:'ID',
            options:{
                filter:true,
                sort:true
            }
        },
        {
            name:'name',
            label:'Name',
            options: {
                filter: true,
                sort:true
            }
        },
        {
            name:'email',
            label:'Email',
            options: {
                filter:true,
                sort: true
            }
        },
        {
            name:'action',
            label: 'Action',
            options: {
                filter: false,
                sort:false
            }
        }
    ];

    const contacts = [
        {id:1,name:'Allen Hardy',email:'foo@bar.com'}
    ];

    const data = contacts.map((contact) => {
        return {
            id:contact.id,
            name:contact.name,
            email:contact.email,
            action:<Link to={`/dashboard/contact/edit/${contact.id}`}>
                <Button variant={`contained`} endIcon={<EditAttributes />} title={"Edit"} >Edit</Button>
            </Link>
        }
    })

    const options = {
        filterType: 'checkbox',
    };

    return (
        <MUIDataTable
            title={"Contact form submissions"}
            data={data}
            columns={columns}
            options={options}
        />
    )
}

export default ContactData;
