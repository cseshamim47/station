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

void f()
{}

int Case;
void solve()
{
    int n,m;
    cin >> n >> m;
    if(m == 0)
    {
        cout << "the denominator can not be zero" << endl;
        return;
    }

    for(int i = 2; i <= abs(max(n,m)); i++)
    {
        while(n % i == 0 && m%i == 0)
        {
            n/=i;
            m/=i;
        }
    }
    if(m < 0) 
    {
        m *= -1;
        n *= -1;
    }
    cout << n << " ";
    if(m > 1) cout << m;
    cout << endl;

    // cout << n << " " << m << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
    //f();
}