#include <bits/stdc++.h>
using namespace std;

// 1. In statistics, the mode of a group of numbers is the one that occurs the most often.
// For example : 100,2,19,23,1,2,3,4,5,6,4,8,4,8,10,12. Here, the mode is 4. Because it occurs 3 times. 
// Write e progam that allows users to enter a list of 20 numbers and then finds and displays
// the mode.

// 2. Write a progam that repeteadly reads strings from the keyboard until the users enters "quit".

// 3. Write a program that acts like an electronic dictonary. If the user enters a word in the 
// dictionary, the program display its meaning. 

// 1. Given an expression, you need to find the count of variable names and output them. 
// For example : 
// input : ans=x1+60+y1-90 /// 1x <- not a valid variable
// output :
// variable count:  3 
// variable 1 : ans 
// varibale 2 : x1
// variable 3 : y1

class problems{
    private:
    string str;
    map<string,string> dictonary;

    public:

    void practice()
    {
        ///random number generanor
        srand(time(0));
        for(int i = 1; i <= 6; i++)
            cout << (rand()%6)+1 << endl;
    }

    void findVariable()
    {
        cin >> str;
        stack<char> stk;
        vector<string> ans;

        int n = str.size();
        stk.push('+');
        for(int i = n-1; i >= 0; i--)
        {
            stk.push(str[i]);
        }
        //ans=x1+60+y1-90
        string tmp = "";
        while(stk.empty() == false)
        {
            char ch = stk.top();
            stk.pop();
            if(ch == '=' || ch == '+' or ch == '-')
            {
                bool isValid = false;
                for(int i = 0; i < tmp.size(); i++)
                {
                    if(tmp[i]>'9')
                    {
                        isValid = true;
                        break;
                    }
                }
                // cout << tmp << endl;
                if(isValid == true)
                {
                    ans.push_back(tmp);
                }
                tmp = "";
            }else
            {
                tmp += ch;
            }
        }
        cout << "variable count : ";
        cout << ans.size() << endl;
        cout << "Varibales are : " << endl;
        for(auto x : ans) cout << x << endl; 
    }

    void fillDictonary()
    {
        dictonary["math"] = "gonit";
        dictonary["do"] = "koro";
        dictonary["i"] = "ami";
        dictonary["rice"] = "bhaat";
        dictonary["eat"] = "khai";
        dictonary["orange"] = "komola";
        dictonary["good"] = "valo"; // "Good, GOod, GoOd, GOOD"

    }

    void electronicDictornary()
    {
        fillDictonary();
        cout << "Enter a word(\"quit\" to exit) : ";
        while(cin >> str)
        {
            if(str == "quit") return;
            transform(str.begin(),str.end(),str.begin(), ::tolower);
            if(dictonary.count(str))
            {
                cout << str << " means : "<< dictonary[str] << endl;
            }else cout << "There is no such word in the dictonary" << endl;

            cout << "\nEnter a word(\"quit\" to exit) : ";
        }


    }

    void repeatedInput()
    {
        while(getline(cin, str))
        {
            if(str == "quit") return;
            cout << str << endl;
        }
    }

    int mode()
    {
        srand(time(0));
        vector<int> v;
        for(int i = 0; i < 20; i++)
        {
            v.push_back(rand()%10);
        }

        sort(v.begin(),v.end());
        cout << "original values : ";
        for(auto x : v) cout << x << " ";
        cout << endl;
        //  key, value
        map<int,int> mp;
        for(int i = 0; i < 20; i++)
        {
            mp[v[i]]++;
        }

        int mx = 0;
        int key = 0;
        for(auto x : mp)
        {
            if(x.second > mx)
            {
                mx = x.second;
                key = x.first;
            }
        }

        return key;
    }
};


int main()
{
    problems p1;

    p1.findVariable();
    // p1.electronicDictornary();
    // p1.repeatedInput();
    // cout << p1.mode() << endl;
    // p1.practice();
    
}



// cd Tests & cls & g++ test1.cpp & a.exe