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
    string a = in, s = in;
    int as = s(a), ss = s(s);
    int z = max(as,ss) - min(as,ss);
    string ca = a;

    string tmp = "";
    fo(i,z) tmp+='0';

    // if(as > ss) tmp += s, s = tmp;
    if(as < ss) tmp += a, a = tmp;

    as = max(as,ss);
    string ans = "";


    for(int i = as-1, ii = as-1; i >= 0 && ii >= 0; i--,ii--)
    {
        int k2;

        int k1;

        k1 = stoi(s.substr(ii,1));

        if(ii-1 >= 0)
        k2 = stoi(s.substr(ii-1,2));

        int j = stoi(a.substr(i,1));
        // deb2(k2,j);

        if(ii-1 >= 0 && k2-j < 10 && s[ii-1] != '0') 
        {
            string temp = to_string(k2-j);
            // deb(temp);
            temp += ans;
            ans = temp;
            ii--;
        }else
        {
            string temp = to_string(k1-j);
            // deb(temp);
            temp += ans;
            ans = temp;
            
        }
        // deb(ans);

    }   
    string b = ans;
    a = ca;
    if(s(a) < s(b))
    {
        string tmp = "";
        for(int i = 0; i < s(b)-s(a); i++) tmp+='0';
        tmp += a;
        a = tmp;

    }else if(s(a) > s(b))
    {
        string tmp = "";
        for(int i = 0; i < s(a)-s(b); i++) tmp+='0';
        tmp += b;
        b = tmp;
    }

    string check = "";
    // deb2(a,b);
    for(int i = s(a)-1; i >= 0; i--)
    {
        string tmp = to_string(a[i]-'0' + b[i] - '0');
        // deb(tmp);
        tmp += check;
        check = tmp;
    }
    if(check == s)
    {
        for(i = 0; i < s(ans); i++) if(ans[i] != '0') break;
        for(; i < s(ans); i++) cout << ans[i];
        nl
    }
    else cout << -1 << endl;
    
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