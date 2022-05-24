#include <bits/stdc++.h>
using namespace std;

#define fo(i,n) for(i=0;i<n;i++)
#define vi vector<int>
#define pb push_back
#define pf push_front
#define deb(x) cout << #x << "=" << x << endl
#define deb2(x, y) cout << #x << "=" << x << "," << #y << "=" << y << endl
#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define nl printf("\n");
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define ll unsigned long long
#define MAX 1000006

struct{
    template<class T> operator T() {
        T x;
        cin >> x;
        return x;
    }
}in;

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
    int i,j,m,n;
    n = in, m = in;
    char a[n][m];

    char c;

    fo(i,n)
        fo(j,m)
        {
            c = in;
            a[i][j] = c;
        }

    bool ok = true;
    while(ok) // up
    {
        fo(i,n)
        {
            fo(j,m)
            {
                if(a[i][j] == 'R')
                {
                    if(i-1 >= 0)
                    {
                        a[i-1][j] = 'R';
                        a[i][j] = 'E';
                    }else ok = false;
                }
            }
            if(!ok) break;
        }

    }

    ok = true;
    // nl;
    while(ok) // left
    {
        fo(j,m)
        {
            fo(i,n)
            {
                if(a[i][j] == 'R')
                {
                    if(j-1 >= 0)
                    {
                        a[i][j-1] = 'R';
                        a[i][j] = 'E';
                    }else ok = false;
                }
            }
            if(!ok) break;
        }

        // fo(i,n)
        // {
        //     fo(j,m)
        //     {
        //         cout << a[i][j];
        //     }
        //     nl;
        // }
        // nl;

    }

    if(a[0][0] == 'R') cout << "YES" << endl;
    else cout << "NO" << endl;
    
    
}

int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    w(t)
    // solve();
    // f();
}