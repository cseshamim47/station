







#ifndef _GLIBCXX_NO_ASSERT
//#include <cassert>
#endif
#include <cctype>
#include <cerrno>
#include <cfloat>
#include <ciso646>
#include <climits>
#include <clocale>
#include <cmath>
#include <csetjmp>
#include <csignal>
#include <cstdarg>
#include <cstddef>
#include <cstdio>
#include <cstdlib>
#include <cstring>
#include <ctime>
#include <cwchar>
#include <cwctype>
 
#if __cplusplus >= 201103L
#include <ccomplex>
#include <cfenv>
#include <cinttypes>
//#include <cstdalign>
#include <cstdbool>
#include <cstdint>
#include <ctgmath>
//#include <cuchar>
#endif
 
// C++
#include <algorithm>
#include <bitset>
#include <complex>
#include <deque>
#include <exception>
#include <fstream>
#include <functional>
#include <iomanip>
#include <ios>
#include <iosfwd>
#include <iostream>
#include <istream>
#include <iterator>
#include <limits>
#include <list>
#include <locale>
#include <map>
#include <memory>
#include <new>
#include <numeric>
#include <ostream>
#include <queue>
#include <set>
#include <sstream>
#include <stack>
#include <stdexcept>
#include <streambuf>
#include <string>
#include <typeinfo>
#include <utility>
#include <valarray>
#include <vector>
 
#if __cplusplus >= 201103L
#include <array>
#include <atomic>
#include <chrono>
#include <codecvt>
#include <condition_variable>
#include <forward_list>
#include <future>
#include <initializer_list>
#include <mutex>
#include <random>
#include <ratio>
#include <regex>
#include <scoped_allocator>
#include <system_error>
#include <thread>
#include <tuple>
#include <typeindex>
#include <type_traits>
#include <unordered_map>
#include <unordered_set>
#endif
 
#if __cplusplus >= 201402L
#include <shared_mutex>
#endif
 
#if __cplusplus >= 201703L
#include <any>
//#include <charconv>
// #include <execution>
//#include <filesystem>
#include <optional>
//#include <memory_resource>
#include <string_view>
#include <variant>
#endif
 
#if __cplusplus > 201703L
#include <bit>
// #include <compare>
// #include <span>
// #include <syncstream>
#include <version>
#endif
 
using namespace std;
 
/*#include <ext/pb_ds/assoc_container.hpp>
using namespace __gnu_pbds;
using namespace std;
 
typedef tree<long long, null_type, less<long long>, rb_tree_tag,
         tree_order_statistics_node_update>
is;*/
 
#define fb find_by_order
#define ok order_of_key
 
#define mem(x,y) memset(x,y,sizeof x)
 
typedef long long ll;
typedef int ii;
 
typedef pair<ll,ll> pi;
typedef vector<pair<ll,ll>> vii;
 
#define map unordered_map
 
#define INF 100000000000000007
#define pi1 3.141592654
 
typedef unsigned long long ull;
 
#define T while(t--)
#define for2(i,a,b) for(i=a;i>=b;i--)
#define for3(i,a,b) for(i=a;i<=b;i=i+2)
#define for1(i,a,b) for(i=a;i<=b;i=i+1)
#define for4(i,a,b) for(i=a;i>=b;i=i-2)
 
#define pb push_back
#define pf push_front
 
#define ff first
#define ss second
 
#define si set<ll>
#define se multiset<ll>
 
#define mp midpoint
 
#define pre starts_with
#define suf ends_with
 
typedef long double ld;
typedef vector<ll> vi;
 
 
#define clz __builtin_clzll
#define ctz __builtin_ctzll
#define popcount __builtin_popcountll
#define parity __builtin_parityll
 
#define all(v) sort(v.begin(),v.end())
#define all1(v) sort(v.rbegin(),v.rend())
 
#define sorted(v) is_sorted(v.begin(),v.end())
#define sorted1(v) is_sorted(v.begin(),v.end())
 
#define pff(uuv) printf("%lld\n",uuv)
 
#define pf1(uu) printf("%.7Lf\n",uu)
 
#define sb has_single_bit
 
bool comp(pair<ll,char> aa, pair<ll,char> bb) {
   if (aa.ff != bb.ff) return aa.ff > bb.ff;
   return aa.ss < bb.ss;
}
bool comp1(pair<ll,char> aa, pair<ll,char> bb) {
   if (aa.ff != bb.ff) return aa.ff < bb.ff;
   return aa.ss > bb.ss;
}
bool comp2(pair<ll,ll> aa, pair<ll,ll> bb) {
   if (aa.ff != bb.ff) return aa.ff > bb.ff;
   return aa.ss < bb.ss;
}
bool comp3(pair<ll,ll> aa, pair<ll,ll> bb) {
   if (aa.ff != bb.ff) return aa.ff < bb.ff;
   return aa.ss > bb.ss;
}
 
ll rup(ll ik,ll ikk){
 
if(ik%ikk==0) return ik/ikk;
else return (ik/ikk)+1;
 
}
ll gcd(ll a,ll b){
if(b==0) return a;
 
return gcd(b,a%b);
 
 
}
ll lcm(ll a ,ll b){
 
return (a*b)/gcd(a,b);
 
 
}
 
 
ll nm(ll a,ll b){
 
 
  return (b + (a%b)) % b;
 
}
 
struct hp {
   template <class T1, class T2>
   size_t operator()(const pair<T1, T2>& p) const
   {
       auto hash1 = hash<T1>{}(p.first);
       auto hash2 = hash<T2>{}(p.second);
       return hash1 ^ hash2;
   }
};
 
 
/*ll parent[100005];
 
 
void makeset(ll i){
 
    parent[i]=i;
 
    
}
 
ll find(ll u){
 
    if(parent[u]==u) return u;
    
    return parent[u]=find(parent[u]);
    
 
    
}
 
void uni(ll xx,ll yy){
 
    ll a=find(xx);
    ll b=find(yy);
    
    if(a!=b){
    
        
        parent[a]=b;
        
        
    }
    
}*/
 
/*ll sieve[1100]={};
 
void sieve1(ll n1){
 
    
 
 for (ll x1 = 2; x1 <= n1; x1++) {
         if (sieve[x1]) continue;
         for (ll u1 = 2*x1; u1 <= n1; u1 += x1) {
            sieve[u1] = x1;
         }
 }
 
}*/
 
/*std::ostream& operator << (std::ostream& dest, __int128_t value) {
   std::ostream::sentry s(dest);
   if (s) {
       __uint128_t tmp = value<0?-value:value;
       char buffer[128];
       char* d = std::end(buffer);
       do {
           -- d;
           *d = "0123456789"[tmp%10];
           tmp/=10;
       }while(tmp!=0);
       if(value<0) {
           --d;
           *d = '-';
       }
       ll len = std::end(buffer)-d;
       if (dest.rdbuf()->sputn(d,len)!=len) {
           dest.setstate(std::ios_base::badbit);
       }
   }
   return dest;
}*/
 
ll modpow(ll x1, ll n1, ll m1) {
        if (n1 == 0) return 1%m1;
        long long u1 = modpow(x1,n1/2,m1);
        u1 = (u1*u1)%m1;
        if (n1%2 == 1) u1 = (u1*x1)%m1;
        return u1;
    
}
 
ll npow(ll A,ll B){
 
    if(B==0) return 1;
    
    ll C=npow(A,B/2);
    
    ll U=C*C;
    
    if(B%2==1) U*=A;
    
    return U;
 
}
    
#define mx 100002
ll arr[mx];
ll tree[3*mx];
 
void init(ll node,ll b,ll e){
 
  if(b==e){
  
      tree[node]=arr[b];
      return;
  }
  ll left=2*node;
  ll right=(2*node)+1;
  ll mid=(b+e)/2;
  init(left,b,mid);
  init(right,mid+1,e);
  
  tree[node]=max(tree[left],tree[right]);
  
}
ll query(ll node, ll b, ll e, ll i, ll j)
{
    if (i > e || j < b)
        return -INF; //বাইরে চলে গিয়েছে
    if (b >= i && e <= j)
        return tree[node]; //রিলেভেন্ট সেগমেন্ট
    ll Left = node * 2; //আরো ভাঙতে হবে
    ll Right = node * 2 + 1;
    ll mid = (b + e) / 2;
    ll p1 = query(Left, b, mid, i, j);
    ll p2 = query(Right, mid + 1, e, i, j);
    return max(p1,p2); //বাম এবং ডান পাশের যোগফল
}
void update(ll node, ll b, ll e, ll i, ll newvalue)
{
    if (i > e || i < b)
        return; //বাইরে চলে গিয়েছে
    if (b >= i && e <= i) { //রিলেভেন্ট সেগমেন্ট
        tree[node] = newvalue;
        return;
    }
    ll Left = node * 2; //আরো ভাঙতে হবে
    ll Right = node * 2 + 1;
    ll mid = (b + e) / 2;
    update(Left, b, mid, i, newvalue);
    update(Right, mid + 1, e, i, newvalue);
    tree[node] = max(tree[Left],tree[Right]);
}
 
 
ll yo(ll kk){
 
    ll l=0,r=1000000007;
 
    ll ans=0;
 
    while(l<=r){
    
        ll mid=(l+r)/2;
        
        ll pp=mid*mid;
        
       // if(pp==kk) return mid;
        
        if(pp>kk) r=mid-1;
        else {ans=mid; l=mid+1;}
    
        
    
    }
   
    return ans;
    
}
 
struct boost{
    static uint64_t splitmix64(uint64_t x) {
        x += 0x9e3779b97f4a7c15;
        x = (x ^ (x >> 30)) * 0xbf58476d1ce4e5b9;
        x = (x ^ (x >> 27)) * 0x94d049bb133111eb;
        return x ^ (x >> 31);
    }
 
    size_t operator()(uint64_t x) const {
        static const uint64_t FIXED_RANDOM = chrono::steady_clock::now().time_since_epoch().count();
        return splitmix64(x + FIXED_RANDOM);
    }
};
 
template <class K, class V> using um = unordered_map <K, V, boost>;
 
/*ll ans[200002][20]={};
 
ll find(ll x,ll k){
     
    ll jh=x;
    
    ll yy=k;
    while(yy!=0){
 
        ll pp=__builtin_ctzll(yy);
        jh=ans[jh][pp];
 
        yy-=(1LL<<pp);
 
 
    }
    
    return jh;
    
}
    
ll n;
 
vi adj[200002];
 
ll p[200002];
 
void dfs(ll s,ll e,ll pp){
    
    p[s]=pp;
    ans[s][0]=e;
    
    for(auto u : adj[s]){
    
        if(u==e) continue;
        
        dfs(u,s,pp+1);
        
        
    }
    
}
    
ll lca(ll x,ll y){
 
    ll jk=p[x];
    ll jh=p[y];
    
    if(jh>jk){
    
        y=find(y,jh-jk);
        
    }
    else if(jk>jh){
        
        x=find(x,jk-jh);
        
    }
        
    if(x==y) return x;
    
    ll l=1,r=n-1;
    
    ll res=-1;
    
    while(l<=r){
    
        ll mid=midpoint(l,r);
    
        ll aa=find(x,mid);
        ll bb=find(y,mid);
        
        if(aa==bb){
            
            res=aa;
            r=mid-1;
            
        }
        else l=mid+1;
        
        
        
    }
    
    return res;
    
    
}*/
 
 
ll dx[] = {0, 0, -1, 1};
ll dy[] = {-1, 1, 0, 0};

int main(){
 
   ios::sync_with_stdio(0);
   cin.tie(0);
   cout.tie(0);
   
    ll t=1;
    
    //cin>>t;
    
    while(t--){
     
        string s;
        
        cin>>s;
        
        ll pp=s.length();
        
        ll i;
        
        string yy="";
        
        vector<string> v;
        
        for1(i,0,pp-1){
        
            yy+=s[i];
            
            if(i+1<=pp-1 && s[i+1]=='0'){
            
                continue;
                
            }
            else{
                
                v.pb(yy);
                yy="";
                
            }
            
            
        }
         
        ll ans=0;
        
        for(auto u : v){
        
            ll kk=stoll(u);
            
            if(u.length()>1){
            
                ll pp=u[0]-'0';
                
                ans++;
                
                if(pp>1){
                
                    ll jk=pp-1;
                    
                    for(ll i=2;i*i<=jk;i++){
                    
                        while(jk%i==0){
                        
                            jk/=i;
                            ans+=i;
                            
                        }
                        
                        
                    }
                    
                    if(jk>1) ans+=jk;
                    
                    ll dal=u.length();
                    ans+=dal;
                    
                }
                
                ll bal=9-(pp-1);
                
                ll kk2=u.length();
                kk2--;
                
                for(ll i=2;i*i<=bal;i++){
                
                    while(bal%i==0){
                    
                        bal/=i;
                        ans+=i;
                        
                    }
                    
                    
                }
                
                if(bal>1) ans+=bal;
                
                if(kk2!=1) ans+=kk2;
                
                continue;
                
            }
            
            if(kk==1){
                
                ans++;
                continue;
                
            }
            
            for(ll i=2;i*i<=kk;i++){
            
                while(kk%i==0){
                
                    kk/=i;
                    ans+=i;
                    
                }
                
                
            }
            
            if(kk>1) ans+=kk;
            
            
        }
        
        
        cout<<ans<<"\n";
        
        
        
        
        
        
        
        
        
    }
 
    
 
}
