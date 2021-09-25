#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 100009

bool prime[MAX];
vector<int> p;
void sieve()
{
    for(int i = 3; i*i <= MAX; i+=2)
    {
        if(!prime[i])
        {
            for(int k = i*i; k < MAX; k+=i) prime[k] = true;
        }
    }

    p.push_back(2);
    for(int i = 3; i < MAX; i+=2) if(!prime[i]) p.push_back(i);
    // for(int i = 0; i < 10; i++) cout << p[i] << " ";
}

vector<int> pf(int n)
{
    int k = n;
    vector<int> v;
    for(int i = 0; i < p.size() && p[i]*p[i] <= k; i++)
    {
        int np = p[i];
        while(k % np == 0)
        {
            // cout << np << " ";
            v.push_back(np);
            k/=np;
        }
    }
    if(k > 1) v.push_back(k);
    return v;
}

void solve()
{
    int n,k;
    cin >> n >> k;
    auto af = pf(n);
    int sz = af.size();
    if(sz < k) cout << -1 << endl;
    else 
    {
        vector<int> ans;
        int f = k-1;
        for(int i = 0; i < f; i++)
        {
            cout << af[i] << " ";
        }
        int sum = 1;
        for(int i = f; i < sz; i++)
        {
            sum *= af[i];
        }
        cout << sum << endl;
    }
}

int main()
{
    sieve();
    solve(); 
}