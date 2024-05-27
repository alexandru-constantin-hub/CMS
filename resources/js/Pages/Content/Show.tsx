import { Head } from '@inertiajs/react';
import { PageProps } from '@/types';
import { ReactElement, useState } from 'react';


export default function Content({ auth, contents }: PageProps) {
    return (
            <>
             <Head title="Dashboard" />
            <div>{JSON.stringify(content.data)}</div>
            
            </>  
    );
    
}
