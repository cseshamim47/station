#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; scanf("%d",&t); while(t--){ solve(); }

#define ll long long
#define MAX 100001

vector<ll> d[10001];

int all;
void div(ll n)
{
    ll k = n;
    ll cnt = 0;
    ll totalDiv = 1;
    for(ll i = 2; i*i <= k; i++)
    {
        // all++;
        cnt = 0;
        while(k % i == 0)
        {
            // all++;
            k/=i;
            cnt++;
        }
        totalDiv *= (2*cnt+1);
    }
    if(k > 1) totalDiv*=3;
    if(totalDiv < 10000) d[totalDiv].push_back(n*n);
    if(all < totalDiv) all = totalDiv;
}

void solve()
{
    ll k,a,b;
    scanf("%lld %lld %lld",&k,&a,&b);
    cout << upper_bound(d[k].begin(),d[k].end(),b) - lower_bound(d[k].begin(),d[k].end(),a) << "\n";
}

int main()
{
    d[1].push_back(1);
    for(int i = 2; i < MAX; i++) div(i); // TC : O(n*sqrt(n))
    cout << all << endl;
    w(t)
}