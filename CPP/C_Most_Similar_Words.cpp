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

int f(string s1,string s2)
{
    int sum = 0;
    
        for(int j  = 0; j < s(s2); j++)
        {
            if(s1[j] > s2[j]) sum += s1[j]-s2[j];
            else sum += s2[j]-s1[j];
        }

    return sum;
    
}

int Case;
void solve()
{
    int i,j,m,n;
    n = in, m = in;
    string str[n];
    fo(i,n) cin >> str[i];
    // sort(str->begin(),str->end());
    int sum = INT_MAX;
    fo(i,n)
    {
        int tmp = 0;
        string cp = str[i];

        for(int j = i+1; j < n; j++)
        {
            sum = min(sum,f(cp,str[j]));
        }

        // for(int col = 0; col < m; col++)
        // {
        //     for(int row = i+1; row < n; row++)
        //     {
        //         string sec = str[row];
        //         if(cp[col] > sec[col]) tmp += (cp[col]-sec[col]);
        //         else tmp += (sec[col]-cp[col]);
        //     }
        // }
        // sum = min(tmp,sum);
    }

    cout << sum << endl;
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