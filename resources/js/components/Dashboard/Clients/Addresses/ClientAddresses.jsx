
import React from "react";
import AddressesData from "./AddressesData";
import CreateClientAddress from "./CreateClientAddress";

const ClientAddresses = ({clientId}) => {

    const client = clientId

    return (<>
        <CreateClientAddress id={client.id} />
        <AddressesData clientId={client.id} />
    </>)
}

export default ClientAddresses;
