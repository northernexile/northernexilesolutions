
import React from "react"
import MUIDataTable from "mui-datatables"

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
        }
    ];

    const contacts = [
        {id:1,name:'Allen Hardy',email:'foo@bar.com'}
    ];

    const options = {
        filterType: 'checkbox',
    };

    return (
        <MUIDataTable
            title={"Contact form submissions"}
            data={contacts}
            columns={columns}
            options={options}
        />
    )
}

export default ContactData;
