#include<bits/stdc++.h>
#define ll long long
#define ull unsigned long long
ll mod=1000000007;
#define pll pair<ll,ll>
using namespace std;
ll gcd(ll a, ll b)
{
if (b == 0)
return a;
return gcd(b, a % b);
}

void solve()
{
    ll n,m;
    cin>>n>>m;
    char a[2*n][m];
    vector<pll> v;;
    for(int i=0;i<2*n;i++) v.push_back({i,0});
    for(int i=0;i<2*n;i++){
        for(int j=0;j<m;j++){
           cin>>a[i][j];
        }
    }
    for(int j=0;j<m;j++){
        vector<pll> tmp;
        for(int i=0;i<2*n;i++){
            auto f=v[i],s=v[i+1];i++;
            ll p1=f.first,p2=s.first;
            char m1=a[p1][j],m2=a[p2][j];
            if(m1==m2){
                tmp.push_back(f);tmp.push_back(s);continue;
            }
            if(m1=='G' && m2=='C'){
                f.second++;
            }
            else if(m1=='G' && m2=='P'){
                s.second++;
            }
            else if(m1=='C' && m2=='P'){
                f.second++;
            }
            else if(m1=='C' && m2=='G'){
                s.second++;
            }
            else if(m1=='P' && m2=='G'){
                f.second++;
            }
            else if(m1=='P' && m2=='C'){
                s.second++;
            }
            tmp.push_back(f);tmp.push_back(s);
        }
        v=tmp;
        sort(v.begin(),v.end(),[](auto& a, auto& b){
        if(a.second==b.second) return a.first<b.first;
        return a.second>b.second; 
        });
    }
   
    for(auto x:v) cout<<x.first+1<<endl;
}
int main()
{
ios_base::sync_with_stdio(false);
cin.tie(0);cout.tie(0);
int t=1;//cin>>t;
while(t--)
{
solve();
}
return 0;
}