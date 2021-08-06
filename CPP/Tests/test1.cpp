#include<bits/stdc++.h>
using namespace std;
typedef long long ll;
const ll N=1e5;
const ll mxN=2e3;
vector<ll> prime,factor[N];
bool vis[N];
 
void divCount(ll n){ // O(sqrt(n))
cout << n << endl;
    ll temp=n;
    ll ans=1;
    for(ll i=0;i<prime.size() && prime[i]*prime[i]<=n;i++){
        ll cn=0;
        if(n%prime[i]==0){
            while(n%prime[i]==0){
                cn++;  
                n/=prime[i];
                
            }
            ans=ans*(2*cn+1); // formula and here, cn = a
            // 10 - > 3*3 
        }
    }
 
    if(n>1){
        cout << "- > " << n << endl;
        ans=ans*3; // here, if n>1 then we should multiply ans by 3
    }
    // total divisor = 3 ,then temp = 2, 3 , 5, 7......
    // so, temp*temp = 4, 9, 25, 49..........
    cout << ans << " " << temp*temp << endl;
        getchar();
    factor[ans].push_back(temp*temp); // factor[3].push_back(2*2,3*3,5*5...)
     
}
void sieve(){
    for(ll i=3;i*i<=N;i+=2){
        if(vis[i]==0){
            for(ll j=i*i;j<=N;j+=2*i){
                vis[j]=1;
            }
        }
    }
    prime.push_back(2);
    for(ll i=3;i<=N;i+=2){
        if(vis[i]==0) prime.push_back(i);
    }
 
}
int main(){
    sieve();  //O(Nlog(logN))
 
    for(ll i=1;i<=N;i++){
        divCount(i);
    }
 
    ll t,k,l,r;
    scanf("%lld",&t);
    while(t--){
        scanf("%lld%lld%lld",&k,&l,&r);
        auto LB=lower_bound(factor[k].begin(),factor[k].end(),l)-factor[k].begin(); //O(logN)
        auto UB=upper_bound(factor[k].begin(),factor[k].end(),r)-factor[k].begin();  //O(logN)
 
        printf("%lld\n",UB-LB);
 
    }
}


// 100 = 9
// 2 2 5 5 = 2+1 * 2+1 = 3