
import React, {useEffect} from "react"
import MUIDataTable from "mui-datatables"
import Button from "@mui/material/Button";
import {EditAttributes} from "@mui/icons-material";
import {Link} from "react-router-dom";
import {useAppDispatch,useAppSelector} from "../../../redux/hooks/hooks";
import {getAllContacts} from "../../../redux/actions/contactActions";

const ContactData = () => {

    const dispatch = useAppDispatch()

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
            name:'created_at',
            label:'Created',
            options: {
                filter: true,
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

    const contacts = useAppSelector(state => state.contact.contacts)

    useEffect(() => {
        dispatch(getAllContacts())
    },[])

    const data = contacts.map((contact) => {
        return {
            id:contact.id,
            name:contact.name,
            email:contact.email,
            created_at:'',
            action:<Link to={`/dashboard/messages/${contact.id}`}>
                <Button variant={`contained`} endIcon={<EditAttributes />} title={`Edit contact record id:${contact.id}`} >Edit</Button>
            </Link>
        }
    })

    const selectContact = (id) => {
        return contacts.find((obj) => {
            return obj.id === id;
        });
    }

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
