#include <bits/stdc++.h>
#include <ext/pb_ds/assoc_container.hpp>
using namespace std;
using namespace __gnu_pbds;

#define int long long
#define ll unsigned long long
#define MAX 1000006
typedef tree<int, null_type, less_equal<int>, rb_tree_tag, tree_order_statistics_node_update > ordered_set;
// less_equal = multiset, less = set, greater_equal = multiset decreasing, greater = set decreaseing
/// cout<<*X.find_by_order(1)<<endl; // iterator to the k-th element
/// cout<<X.order_of_key(-5)<<endl;  // number of items in a set that are strictly smaller than our item
#define fo(i,n) for(i=0;i<n;i++)
#define Fo(i,k,n) for(i=k;k<n?i<n:i>n;k<n?i+=1:i-=1)
#define pi(x)	printf("%d\n",x)
#define pl(x)	printf("%lld\n",x)
#define plg(x)	printf("%lld ",x)
#define ps(s)	printf("%s\n",s)
#define Y printf("YES\n");
#define N printf("NO\n");
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

    n = 4;
    m = 4;
    char c[n][m];
    fo(i,n)
    {
        fo(j,m)
        {
            c[i][j] = in;
        }
    }

    fo(i,n)
    {
        fo(j,m)
        {
            int x = 0;
            int dot = 0;
            int k;

            Fo(k,j,min<int>(j+3,m)) // left
            {
                if(c[i][k] == 'x') x++;
                else if(c[i][k] == 'o') x = -100;
                else if(c[i][k] == '.') dot++;
            }
            if(x == 2 && dot == 1) 
            {
                // cout << "1" << endl;
                Y
                return;
            }

            x = 0;
            dot = 0;
            Fo(k,i,min<int>(i+3,n)) // down
            {
                if(c[k][j] == 'x') x++;
                else if(c[k][j] == 'o') x = -100;
                else if(c[k][j] == '.') dot++;
            }
            if(x == 2 && dot == 1) 
            {
                // cout << "2" << endl;
                Y
                return;
            }

            x = 0;
            dot = 0;
            for(int r = i, cc = j; r < min<int>(i+3,n) && cc < min<int>(j+3,m); r++, cc++) // diagronal down
            {
                if(c[r][cc] == 'x') x++;
                else if(c[r][cc] == 'o') x = -100;
                else if(c[r][cc] == '.') dot++;
            }
            if(x == 2 && dot == 1) 
            {
                // cout << "3" << endl;
                // deb2(i,j);
                Y
                return;
            }

            x = 0;
            dot = 0;
            for(int r = i, cc = j; r >= max<int>(i-3,0) && cc < min<int>(j+3,m); r--, cc++) // diagronal up
            {
                if(c[r][cc] == 'x') x++;
                else if(c[r][cc] == 'o') x = -100;
                else if(c[r][cc] == '.') dot++;
            }
            if(x == 2 && dot == 1) 
            {
                // cout << "4" << endl;
                Y
                return;
            }

        }
    }

    N
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