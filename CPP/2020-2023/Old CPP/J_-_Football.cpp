
#include<bits/stdc++.h>
using namespace std;

#define Speed() ios_base::sync_with_stdio(0);cin.tie(0);cout.tie(0);


bool desc(const pair<int,int>&a,const pair<int,int>&b)
{
  return (abs(a.first-a.second)<abs(b.first-b.second));
}

void solve()
{
  int x,y;
  while(cin>>x>>y)
  {
    
    int cnt=0;
    vector<pair<int,int>>v;
    long long point=0;
    while(x--)
    {
      int a,b;
      cin>>a>>b;
      if(a==b)
        ++cnt;
      else if(a>b)
      {
        point+=(3);
      }
      else
        v.push_back({a,b});
    }
    if(y<=cnt)
      cout<<point+(y*3)+(cnt-y)<<endl;
    else
    {
      point+=(3*cnt);
      y-=cnt;
      sort(v.begin(),v.end(),desc);


      for(int i=0;i<v.size();i++)
        {
          int dis=abs(v[i].first-v[i].second);
          if(dis+1<=y)
          {
            y-=dis;
            y--;
            point+=3;
          }else if(dis==y)
          {
            y-=dis;
            point++;
          }
          else
            break;
          
          // cout<<v[i].first<<" "<<v[i].second<<endl;
        }
       cout<<point<<endl;
    }

   
  }

}
int main() {
  Speed();
   solve();
  
    

  return 0;
}


