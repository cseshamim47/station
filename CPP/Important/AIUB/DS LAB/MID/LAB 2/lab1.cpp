#include <bits/stdc++.h>
using namespace std;
int main()
{
    int mimf, miml, mimm, search, array[100],c=0,mim1,mim2;
    cout<<"How many Numbers you want to insert?\n:";

    cin>>mim2;
    cout<<"Enter "<<mim2<<" array elements\n";
    for (mim1 = 0; mim1 < mim2; mim1++)
    {
        cout<<":";
        cin>>array[mim1];
    }
    cout<<"Case : 1\n";
    cout<<"Enter Data You want to search\n";
    cin>>search;
    mimf = 0;
    miml = mim2 - 1;
    mimm = (mimf+miml)/2;
    while (mimf <= miml)
    {
        if (array[mimm] < search)
        {
            mimf = mimm + 1;
        }
        else if (array[mimm] == search)
        {
            cout<<array[mimm]<<" is found at Index "<<mimm<<"\n";
            c=1;
            break;
        }
        else
            miml = mimm - 1;
        mimm = (mimf + miml)/2;
    }
    if (c==0)
    {
        cout<<search<<" is not found in the Array\n";
    }
    cout<<"\n";
    c=0;
    cout<<"Case : 2\n";
    cout<<"Enter Data You want to search\n";
    cin>>search;
    mimf = 0;
    miml = mim2 - 1;
    mimm = (mimf+miml)/2;
    while (mimf <= miml)
    {
        if (array[mimm] < search)
        {
            mimf = mimm + 1;
        }
        else if (array[mimm] == search)
        {
            cout<<array[mimm]<<" is found at Index "<<mimm<<"\n";
            c=1;
            break;
        }
        else
            miml = mimm - 1;
        mimm = (mimf + miml)/2;
    }
    if (c==0)
    {
        cout<<search<<" is not found in the Array\n";
    }

    return 0;
}