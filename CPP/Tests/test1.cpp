#include<bits/stdc++.h>
using namespace std;

int arr[200005];
int test[200005];
int out[200005];

int main(){
    long long n,sum=0,minv=0;
    cin>>n;
    for(long long i=0; i<n-1; i++){
            cin>>arr[i];
            sum+=arr[i];
            minv=min(minv,sum);
    }
    out[0]=1-minv;
    for(int i=1; i<n; i++)
        out[i]=out[i-1]+arr[i-1];

    for(int i=0; i<n; i++)
    cout << out[i] << " ";
    printf("\n");
    
    for(int i=0; i<n; i++)test[i]=out[i];
    sort(test,test+n);
    for(int i=0; i<n; i++)if(test[i]!=i+1)cout<<-1,exit(0);
    for(int i=0; i<n; i++)cout<<out[i]<<" ";
return 0;
}
