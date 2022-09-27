#include<bits/stdc++.h>
typedef long long int   ll;
typedef long int   l;
typedef long double     ld;

#define pii pair<long long int,long long int>
#define intmax  INT_MAX
#define endl        "\n"
#define READ(x)     freopen(x,"r",stdin)
#define WRITE(x)    freopen(x,"w",stdout)
#define sl(x) scanf("%lld", &x)
#define pl(x) printf("%lld", x)
#define BOOST       ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL)
// for(auto i:v)
#define MAX_LIMIT 1000000
#define mem(a,b)        memset(a,b,sizeof(a))
#define pb              push_back
#define gcd(a, b)       __gcd(a, b)
#define vsorti(v)         sort(v.begin(),v.end())
#define vsortd(v)         sort(v.begin(), v.end(), greater<long long int>());
#define asortd(a,n)       sort(a+1,a+1+n, greater<long long int>());
#define asorti(a,n)       sort(a+1,a+1+n)
#define fo(n)             for(int i=1;i<=n;i++)
using namespace std;
int dx[]={-1, 1, 0, 0, -1, -1, 1, 1};
int dy[]={0, 0, -1, 1, -1, 1, -1, 1};
ll a[1009][1009];
bool visited[1009][1009];
ll level[1009][1009];
ll n,m;
void bfs(int x,int y)
{
    queue<pii>q;
   q.push({x,y});
   visited[x][y]=true;
   level[x][y]=0;
   while(!q.empty())
   {
       pii p=q.front();
       q.pop();
       int ox=p.first;
       int oy=p.second;
        // cout<<"ok"<<" ";

       for(int i=0;i<4;i++)
       {
           int next_p=ox+dx[i];
           int next_q=oy+dy[i];
           if(visited[next_p][next_q]==false and a[next_p][next_q]!=1 and next_p>=1 and next_p<=n and next_q>=1 and next_q<=m)
           {
              visited[next_p][next_q]=true;
              q.push({next_p,next_q});
              level[next_p][next_q]=level[ox][oy]+1;
             

           }

       }
   }
}

int main()
{
     
    //  BOOST;
     while(cin>>n>>m)
     {
       mem(visited,false);
       mem(level,0);
       mem(a,0);
       if(n==0 and m==0) break;
       ll t,k,row,column,q;
       cin>>t;
       while(t--)
       {
         cin>>row>>q;
         while(q--)
         {
            cin>>column;
            a[row][column]=1;
         }


       }
       ll desti1,desti2,source1,source2;
       cin>>source1>>source2>>desti1>>desti2;
       //cout<<visited[0][1]<<" "<<visited[1][0]<<endl;
       bfs(source1,source2);
       cout<<level[desti1][desti2]<<" ";
       

        cout<<endl;
   }
          
   
     
      return 0;
}