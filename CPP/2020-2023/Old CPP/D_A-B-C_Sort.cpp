#include <bits/stdc++.h>
using namespace std;

#define fo(i,n) for(i=0;i<n;i++)
#define deb(x) cout << #x << "=" << x << endl
#define deb2(x, y) cout << #x << "=" << x << "," << #y << "=" << y << endl
#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
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
    n = in;
    deque<int> dq;
    fo(i,n)
    {
        int x;
        cin >> x;
        dq.push_back(x);
    }

    vector<int> v;
    fo(i,n)
    {
        if(!dq.empty())   
        {
            if(dq.size()%2 == 0)
            {
                int a = dq.front();
                dq.pop_front();
                int b = dq.front();
                dq.pop_front();
                if(a < b)
                {
                    v.push_back(a);
                    dq.push_front(b);
                }else
                {
                    v.push_back(b);
                    dq.push_front(a);
                }
            }else
            {
                v.push_back(dq.front());
                dq.pop_front();
            }
        }
    }

    for(int i = 1; i < n; i++)
    {
        if(v[i] >= v[i-1]) continue;
        else 
        {
            cout << "NO" << endl;
            return;
        }
    }
    cout << "YES" << endl;


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