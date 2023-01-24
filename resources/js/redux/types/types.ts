
export type Technology = {
    id: any,
    name: string,
    icon:string,
    description:string
}

export type Content = {
    id:any,
    name:string,
    text:string
}

export type Page = {
    id:any,
    name:string,
    slug:string
}

export type Sector = {
    id:any
    name:string,
    icon:string
}

export type Company = {
    vatNumber:string,
    companiesHouseNumber:string
}

export type TagCloud = {
    id:any,
    value:string,
    count:any
}

export type Service = {
    id:any,
    name:string
}

export type Registration = {
    name:string,
    email:string,
    password:string,
    confirmed:string
}

export type Login = {
    email:string,
    password:string
}
