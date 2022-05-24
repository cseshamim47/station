#include<bits/stdc++.h>
#include<stdio.h>
using namespace std;

#define ll               long long
#define ull              unsigned long long
#define pll              pair <long long,long long>
#define IM               INT_MAX
#define Im               INT_MIN
#define fast             ios_base::sync_with_stdio(0);cin.tie(0);cout.tie(0)
#define read             freopen("input.txt", "r", stdin)
#define write            freopen("output.txt", "w", stdout)
#define pb               push_back
#define all(v)           sort(v.begin(),v.end())
#define rall(v)          sort(v.rbegin(),v.rend())
#define rev(v)           reverse(v.begin(),v.end())
#define ff               first
#define ss               second
#define MOD              1000000007
#define lcm(a, b)        ((a)*((b)/__gcd(a,b)))
#define INF              1e12
#define mem(a, b)        memset(a, b, sizeof(a))
#define POPCOUNT         __builtin_popcountll
#define endl             "\n"
#define pi               2*acos(0.0)


void solve()
{
    ll a,b;

    cin>>a>>b;

    int ans = 0;

    for(ll i=1; i*i<=b; i++)
    {
        ll x = (i*i);

        ll co = 0, co1 = 0;
        ll y = 0;


        while(x)
        {
            y = (y*10)+(x%10);
            x/=10;
            co++;
        }

        ll r = y;

        while(r)
        {
            r/=10;
            co1++;
        }

        ll z = sqrt(y);
        if( (z*z)==y && co==co1)
        {
            cout << i*i << " " << z*z << " " << y << endl;
            ans++;
        }
    }

    cout<<ans<<endl;
}


int main()
{

    fast;

    int t=1;

    // cin>>t;

    while(t--)
        solve();
}
