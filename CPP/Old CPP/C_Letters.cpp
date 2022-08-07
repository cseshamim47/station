#include <bits/stdc++.h>
using namespace std;

#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define ll unsigned long long
#define MAX 1000006

void fileInput()
{
    #ifndef ONLINE_JUDGE
        freopen("input.txt", "r", stdin);
        freopen("output.txt", "w", stdout);
    #endif
}

int gcd(int a, int b)
{
    if(!b) return a;
    return gcd(b,a%b);
}

void f()
{}

int Case;
void solve()
{
    int n,m;
    cin >> n >> m;
    int dorm[n];
    int room[m];
    for(int i = 0; i < n; i++)
    {
        cin >> dorm[i];
    }
    for(int i = 0; i < m; i++)
    {
        cin >> room[i];
    }

    for(int i = 1; i < n; i++)
    {
        dorm[i] += dorm[i-1];
    }

    // for(int i = 0; i < n; i++) cout << dorm[i] << " "; cout << endl;


    for(int i = 0; i < m; i++)
    {
        int x = lower_bound(dorm,dorm+n,room[i]) - dorm;
        // cout << x << " " << room[i] << " " << dorm[x] << endl;
        if(x == 0)
        {
            cout << x+1 << " " << room[i] << endl;
        }else
        {
            cout << x+1 << " " << room[i]-dorm[x-1] << endl;
        }
    }
}

int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    // w(t)
    solve();
    // f();
}