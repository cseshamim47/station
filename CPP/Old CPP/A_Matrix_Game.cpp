// In the name of ALLAH
// █▀▄▀█ █▀▄   █▀ █░█ ▄▀█ █▀▄▀█ █ █▀▄▀█   ▄▀█ █░█ █▀▄▀█ █▀▀ █▀▄
// █░▀░█ █▄▀   ▄█ █▀█ █▀█ █░▀░█ █ █░▀░█   █▀█ █▀█ █░▀░█ ██▄ █▄▀
// cseshamim47
// 08-08-2022 01:29:22


#include <bits/stdc++.h>
#include <ext/pb_ds/assoc_container.hpp>
using namespace std;
using namespace __gnu_pbds;

#define int long long
#define ll unsigned long long
#define sett tree<int, null_type, less_equal<int>, rb_tree_tag, tree_order_statistics_node_update >  /// cout<<*os.find_by_order(val)<<endl; // k-th element it /// less_equal = multiset, less = set, greater_equal = multiset decreasing, greater = set decreaseing ///  cout<<os.order_of_key(val)<<endl;  // strictly smaller or greater
#define fo(i,n) for(i=0;i<n;i++)
#define Fo(i,k,n) for(i=k;k<n?i<n:i>n;k<n?i+=1:i-=1)
#define pi(x)	printf("%d\n",x)
#define pl(x)	printf("%lld\n",x)
#define plg(x)	printf("%lld ",x)
#define ps(s)	printf("%s\n",s)
#define YES printf("YES\n")
#define NO printf("NO\n")
#define MONE printf("-1\n")
#define vi vector<int>
#define pb push_back
#define pf push_front
#define F first
#define S second
#define clr(x,y) memset(x, y, sizeof(x))
#define deb(x) cout << #x << "=" << x << endl
#define deb2(x, y) cout << #x << "=" << x << "," << #y << "=" << y << endl
#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define allg(x) x.begin(),x.end(),greater<int>()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define nl printf("\n");
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
template<typename T> istream& operator>>(istream& in, vector<T>& a) {for(auto &x : a) in >> x; return in;};
template<typename T> ostream& operator<<(ostream& out, vector<T>& a) {for(auto &x : a) out << x << ' ';nl; return out;};
template<typename T1, typename T2> ostream& operator<<(ostream& out, const pair<T1, T2>& x) {return out << x.f << ' ' << x.s;}
template<typename T1, typename T2> istream& operator>>(istream& in, pair<T1, T2>& x) {return in >> x.f >> x.s;}
template<typename T> void Unique(T &a) {a.erase(unique(a.begin(), a.end()), a.end());}
#define MAX 1000006

int g;
struct{
    template<class T> operator T() {
        T x;
        cin >> x;
        return x;
    }
}in;

int dx[] = {-1, 1, 0, 0,-1,-1, 1,1};
int dy[] = { 0, 0,-1, 1,-1, 1,-1,1};

void f()
{}

int Case;

                    // Code Starts From Here       	

void solve()
{
    int a=0,b=0,i=0,j=0,m=0,n=0,k=0,ans=0,cnt=0,odd=0,even=0,sum=0,l=0,r=0,p=0,q=0;
    n = in;
    m = in;
    int c[n][m];
    int row = 0;
    fo(i,n)
    {
        cnt = 0;
        fo(j,m)
        {
            c[i][j] = in;
            cnt += c[i][j];
        }
        if(!cnt) row++;
    }
    int col = 0;
    fo(j,m)
    {
        cnt = 0;
        fo(i,n)
        {
            cnt+= c[i][j];
        }
        if(!cnt) col++;
    }
    k = 0;
    // deb2(row,col);
    bool ashish = true;
    fo(i,n)
    {
        int ii = 0;
        int jj = 0;
        fo(j,m) ii+=c[i][j];
        fo(j,n) jj+=c[j][k];
        if(!(ii+jj)) 
        {
            // c[i][k] = 1;
            row--;
            col--;
            if(ashish) ashish = false;
            else ashish = true;
        }
            k++;
        if(!ii) i--;
        if(!jj) k--;
        // deb(cnt);
        if(k == m || !row || !col) break;
    }

    // deb2(row,col);
    // ans = min(row,col);


    if(ashish) cout << "Vivek" << endl;
    else cout << "Ashish" << endl;
    // bool ashish = true;
    // fo(i,n)
    // {
    //     fo(j,m)
    //     {
    //         if(c[i][j] != 1)
    //         {
    //             cnt = 0;
    //             fo(k,4)
    //             {
    //                 int ii = i+dx[k];
    //                 int jj = j+dy[k];

    //                 if(ii >= 0 && ii < n && jj >= 0 && jj < m) cnt += c[ii][jj];
    //             }

    //             if(!cnt)
    //             {
    //                 c[i][j] = 1;
    //                 if(ashish) ashish = false;
    //                 else ashish = true;
    //             }
    //         }
    //     }
    // }

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