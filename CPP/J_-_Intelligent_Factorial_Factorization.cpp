#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

const int N = 1005;
bool prime[N];
vector<int> p;

void sieve()
{
    for(int i = 2; i*i < N; i++)
    {
        if(!prime[i])
        for(int j = i*i; j < N; j+=i)
        {
            prime[j] = true;
        }
    }

    for(int i = 2; i < N; i++)
    {
        if(!prime[i]) p.push_back(i);
    }
}

int Case;
void solve()
{
    int n;
    cin >> n;
    cout << "Case " << ++Case << ": " << n << " = ";
    for(int i = 0; i < p.size() && p[i] <= n; i++)
    {
        int cp = p[i];
        int cnt = 0;
        int cn = n;
        while(n / cp != 0)
        {
            cnt+=(n/cp);
            cp*=p[i];
        }
        if(i == 0)
        cout << p[i] << " (" << cnt << ")";
        else 
        cout << " * " << p[i] << " (" << cnt << ")";
        
    }
    cout << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    sieve();
    // for(int i = 0; i < 10; i++) cout << p[i] << endl;
    w(t)
    //solve();
}